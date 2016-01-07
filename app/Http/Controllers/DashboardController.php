<?php

namespace ShareApp\Http\Controllers;

use Illuminate\Http\Request;

use ShareApp\Http\Requests;
use ShareApp\Http\Controllers\Controller;

use ShareApp\User;
use ShareApp\Http\Controllers\Auth\AuthController;

use Gate;

class DashboardController extends Controller
{
    public function __construct(){
        if(auth()->check()){
            $this->authorize('dashboard');
        }else{
            $this->middleware('auth');
        }
    }

    public function index(){
        return view('dashboard.index');
    }

    public function users(){
        return view('dashboard.users', [
            'users' => User::all()
        ]);
    }

    public function userDelete(User $user){
        $user->delete();

        fmsgs([
            'title' => 'User Deleted',
            'type'  => 'success',
            'text'  => "Successfully deleting the user, check the list!",
        ]);

        return redirect()->back();
    }

    public function userNew(){
        return view('dashboard.users.new');
    }

    public function userEdit(User $user){
        return view('dashboard.users.edit', [
            'user' => $user
        ]);
    }

    public function userUpdate(Request $request, User $user){
        $this->validate($request, AuthController::validationData($user->id));

        User::find($user->id)->update(
            AuthController::userData($request->all())
        );

        fmsgs([
            'title' => 'User Updated',
            'type'  => 'success',
            'text'  => "Successfully updating the user, check the update!",
        ]);

        return redirect()->back();
    }

    public function userCreate(Request $request){
        $this->validate($request, AuthController::validationData());

        $data = AuthController::userData($request->all());
        // dd($data);
        User::create($data);

        fmsgs([
            'title' => 'User Created',
            'type'  => 'success',
            'text'  => "Successfully adding new user, check the list!",
        ]);

        return redirect()->back();
    }
}
