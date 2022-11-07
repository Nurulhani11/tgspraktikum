<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($name)
    {
        $this->users = $users;
        $name = $request->name;
        return "Hello".$name."Febry!";
    }
}
