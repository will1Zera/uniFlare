<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller{

    // Action da home do sistema
    public function index(){
        return view('welcome');
    }

    // Action para criar evento do sistema
    public function create(){
        return view('events.create');
    }
}
