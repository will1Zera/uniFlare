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

    // Action para criar evento do sistema
    public function create(){
        return view('events.create');
    }
}
