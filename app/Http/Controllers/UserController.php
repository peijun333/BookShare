<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return $user;
    }
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->password = $request->password;
        $user->save();
        return redirect('api/users');
    }
    public function show($id)
    {
        $user = User::find($id);
        return $user;
    }
    public function update()
    {

    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('api/users');
    }
}
