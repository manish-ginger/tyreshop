<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ForgotPassword extends Component
{
    public function index()
    {
        return view('livewire.forgot-password')
        ->layout('layouts.custom-app');
    }
}
