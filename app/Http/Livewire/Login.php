<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Login extends Component
{
    public function index()
    {

        return view('livewire.login')
        ->layout('layouts.custom-app');
    }
}
