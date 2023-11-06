<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

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

        // Procura o usuário dono do evento
        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner]);
    }

    // Action para exibir e fazer ações na dashboard
    public function dashboard(){
        // Pega o usuário autenticado
        $user = auth()->user();

        // Pega todos os eventos desse usuário
        $events = $user->events;

        // Pega todos os eventos que o usuário participa
        $eventsAsParticipant = $user->eventsAsParticipant;

        return view('events.dashboard', ['events' => $events, 'eventsasparticipant' => $eventsAsParticipant]);
    }

    // Action para deletar um evento
    public function destroy($id){
        Event::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Evento excluído com sucesso.');
    }

    // Action para resgatar dados de update
    public function edit($id){
        $user = auth()->user();
        $event = Event::findOrFail($id);

        if($user->id != $event->user_id){
            return redirect('/');
        }

        return view('events.edit', ['event' => $event]);
    }

    // Action para atualizar um evento
    public function update(Request $request){
        $data = $request->all();

        // Validação da imagem para atualizar
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") . "." . $extension);

            $requestImage->move(public_path('img/events'), $imageName);

            $data['image'] = $imageName;
        }

        $event = Event::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Evento atualizado com sucesso.');
    }

    // Action para participar de um evento
    public function joinEvent($id){
        $user = auth()->user();

        $user->eventsAsParticipant()->attach($id);

        $event = Event::findOrFail($id);

        return redirect('/')->with('msg', 'Sua presença está confirmada no evento ' . $event->title);
    }
}
