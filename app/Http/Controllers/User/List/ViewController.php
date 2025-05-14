<?php

namespace App\Http\Controllers\User\List;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index()
    {
        return view('user.list');
    }
    
    public function create()
    {
        return view('user.create');
    }
}
