<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller{

    // Action da home do sistema
    public function index(){
        // Resgata todos os dados do banco de dados através da Model
        $events = Event::all();

        // Manda esses eventos para a view
        return view('welcome', ['events' => $events]);
    }

    // Action para formulário de criar evento do sistema
    public function create(){
        return view('events.create');
    }

    // Action para criar evento do sistema através da request do formulário
    public function store(Request $request){
        // Cria e preenche o objeto de Evento
        $event = new Event;
        $event->title = $request->title;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;

        // Salva o objeto no banco de dados
        $event->save();

        // Redireciona o usuário para a home e utilizando a flash message
        return redirect('/')->with('msg', 'Evento criado com sucesso.');
    }
}
