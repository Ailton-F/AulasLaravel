<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index(){
        $events = Event::all();
        return view('welcome', ['events'=>$events]);        
    }

    public function create(){
        return view('events.create');
    }

    public function store(Request $req){
        $event = new Event;
        $event->title = $req->title;
        $event->city = $req->city;
        $event->private = $req->private;
        $event->description = $req->desc;

        if($req->hasFile('image') && $req->file('image')->isValid()){
            $requestImage = $req->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") . "." . $extension);
            $requestImage->move(public_path('/img/events'), $imageName);
            $event->image = $imageName;
        } else {
            return redirect('/')->with('msg_err', 'Falha ao carregar imagem');
        }

        $event->save();
        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id){
        $event = Event::findOrFail($id);
        return view('events.show', ['event' => $event]);
    }
}
