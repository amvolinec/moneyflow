<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class StartController extends Controller
{
    public function index()
    {
        $roles = Role::pluck('name')->toArray();
        return view('start.index',['roles' => $roles]);
    }
}
