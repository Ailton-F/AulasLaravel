<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class EventController extends Controller
{
    public function index(){
        $search = request('search');

        if($search){
            $events = Event::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();
        } else {
            $events = Event::all();   
        }
        return view('welcome', ['events'=>$events, 'search'=>$search]);        
    }

    public function create(){
        return view('events.create');
    }

    public function store(Request $req){
        $event = new Event;
        $event->title = $req->title;
        $event->date = $req->date;
        $event->city = $req->city;
        $event->private = $req->private;
        $event->description = $req->desc;
        $event->items=$req->items;

        if($req->hasFile('image') && $req->file('image')->isValid()){
            $requestImage = $req->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") . "." . $extension);
            $requestImage->move(public_path('/img/events'), $imageName);
            $event->image = $imageName;
        } else {
            return redirect('/dashboard')->with('msg_err', 'Falha ao carregar imagem');
        }

        $user = auth()->user();
        $event->user_id = $user->id;   

        $event->save();
        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id){
        $event = Event::findOrFail($id);
        $user = auth()->user();
        $hasUserJoined = False;

        if($user){
            $userEvents = $user->eventsAsParticipants->toArray();
            foreach($userEvents as $userEvent){
                if($userEvent['id'] == $id){
                    $hasUserJoined = True;
                }
            }

        }

        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('events.show', ['event' => $event, 'eventOwner'=>$eventOwner, 'hasUserJoined'=> $hasUserJoined]);
    }

    public function dashboard(){
        $user = auth()->user();
        $events = $user->events;
        $eventparticipant = $user->eventsAsParticipants;
        return view('events.dashboard', ['events' => $events, 'eventparticipant' => $eventparticipant]);
    }
    
    // ERROR
    public function destroy($id){
        $event = Event::findOrFail($id);
        $user = auth()->user();
        /*
        if($user->id == $event->user_id){
            $user->eventsAsParticipants()->detach($id);
        }
        */
        Event::findOrFail($id)->delete();
        return redirect('/dashboard')->with('msg', 'Evento deletado com sucesso!');
    }
    // ERROR

    public function edit($id){
        $event = Event::findOrFail($id);
        $user = auth()->user();
        if($user->id != $event->user_id){
            return redirect('/dashboard')->with('err_msg', 'Você não pode editar esse post');
        }
        return view('events.edit', ['event'=>$event]);
    }

    public function update(Request $req){
        $data =  $req->all();
        if($req->hasFile('image') && $req->file('image')->isValid()){
            $requestImage = $req->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") . "." . $extension);
            $requestImage->move(public_path('/img/events'), $imageName);
            $data['image'] = $imageName;
        } else {
            return redirect('/dashboard')->with('msg_err', 'Falha ao carregar imagem');
        }
        Event::findOrFail($req->id)->update($data);
        return redirect('/dashboard')->with('msg', 'Evento editado com sucesso!');
    }

    public function checkPresence($id){
        $user = auth()->user();
        $user->eventsAsParticipants()->attach($id);
        $event = Event::findOrFail($id);
        return redirect('/dashboard')->with('msg', 'Participação no evento '. $event->title .' cadastrada');
    }

    public function unjoin($id){
        $user = auth()->user();
        $user->eventsAsParticipants()->detach($id);
        $event = Event::findOrFail($id);
        return redirect('/dashboard')->with('msg', 'Participação no evento '. $event->title .' removida');
    }
}
