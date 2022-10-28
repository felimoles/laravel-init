<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    //
    public function index(){
        $usr = User::all();

        return view('user.users', compact('usr'));
    }

    public function store(Request $request){
        $newUser = new User();

        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = Hash::make('123456');
        $newUser->role = $request->role;
        $newUser->rut = $request->rut;
        $newUser->save();
        return redirect()->back();

    }

    public function edit($id){
        $user = User::findOrFail($id);

        return view('user.edit',compact('user'));

    }
}
