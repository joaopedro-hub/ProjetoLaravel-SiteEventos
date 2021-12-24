<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $search = request('search');

        if ($search) { //se a search estiver preenchido
            $events = Event::where([
                ['title', 'like', '%' . $search . '%'] //busca por um titulo parecido, não exato
            ])->get(); //get-> porque eu quero pegar um registro do events
        } else {
            $events = Event::all();
        }


        return view('welcome', ['events' => $events, 'search' => $search]);
    }

    public function create()
    {
        return view('events.create');
    }

    //Criando um novo evento
    public function store(Request $request)
    {
        $event = new Event;

        $event->title = $request->title;
        $event->date = $request->date;
        $event->city = $request->city;
        $event->description = $request->description;
        $event->private = $request->private;
        $event->itens = $request->itens;

        //Image Upload
        //getClientOriginalName() -> pegar nome do arquivo
        //strtotime("now") -> cria uma string com base no tempo
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            //Adicionar a imagem a pasta
            $requestImage->move(public_path('img/events'), $imageName);
            $event->image = $imageName; //salvar no banco
        }

        $event->save();
        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    //Buscando um evento pelo seu id
    public function show($id)
    {
        $event = Event::findOrfail($id);

        return view('events.show', ['event' => $event]);
    }
}
