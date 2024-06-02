<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller
{
    public function showMenu()
    {
        return view('player.menu');
    }

    public function showGame()
    {
        return view('player.game');
    }
}