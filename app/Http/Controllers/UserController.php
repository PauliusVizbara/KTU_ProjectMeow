<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $currentUser = Auth::user();
        if ( $currentUser->role_id !== 0)
            return redirect('/animals')->with('status', 'Unauthorized');

        $users = User::all();

        foreach($users as $user){

            switch ($user->role_id) {
                case 0:
                    $user->role = 'Admin';
                    break;
                case 1:
                    $user->role = 'Moderator';
                    break;
                case 2:
                    $user->role = 'User';
                    break;
            }

        }

        return view('users.all',compact('users'));
    }

    public function togglePostRight(Request $request){


        $currentUser = Auth::user();
        if ( $currentUser->role_id !== 0)
            return redirect('/animals')->with('status', 'Unauthorized');

        $user = User::find($request->get('id'));
        $user->can_post = !$user->can_post;
        $user->save();
        return redirect('/users');

    }

}
