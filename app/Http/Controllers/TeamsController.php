<?php

namespace App\Http\Controllers;

use App\Team;

class TeamsController extends Controller
{
    public function index(){
        return view('teams.index', ["teams" => Team::all()] );
    }

    public function create(){
        return view('teams.create');
    }

    public function store(){
        Team::create([
            "name"              => request('name'),
            "email"             => request('email'),
            "slack_webhook_url" => request('slack_webhook_url'),
            "token"             => str_random(24),
        ]);
        return redirect()->route('teams.index');
    }
}
