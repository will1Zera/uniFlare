<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller{

    // Action da home do sistema
    public function index(){
        // Resgata a pesquisa do input
        $search = request('search');

        // Verifica se há algo pesquisado
        if($search){
            // Resgata os dados referente há pesquisa realizada
            $events = Event::where([['title', 'like', '%' .$search. '%']])->get();
        } else{
            // Resgata todos os dados do banco de dados através da Model
            $events = Event::all();
        }

        // Manda esses eventos e pesquisa para a view
        return view('welcome', ['events' => $events, 'search' => $search]);
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
        $event->date = $request->date;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        $event->items = $request->items;

        // Validação da imagem
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;

            // Pegando a extensão da imagem
            $extension = $requestImage->extension();

            // Gerando uma hash única para imagem
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") . "." . $extension);

            // Salva a imagem no diretório public do projeto
            $requestImage->move(public_path('img/events'), $imageName);

            // Preenche a imagem no objeto
            $event->image = $imageName;
        }

        // Resgata o id do usuário e associa ao user_id de eventos
        $user = auth()->user();
        $event->user_id = $user->id;

        // Salva o objeto no banco de dados
        $event->save();

        // Redireciona o usuário para a home e utilizando a flash message
        return redirect('/')->with('msg', 'Evento criado com sucesso.');
    }

    // Action para exibir mais informações do evento
    public function show($id){
        $event = Event::findOrFail($id);

        return view('events.show', ['event' => $event]);
    }
}
