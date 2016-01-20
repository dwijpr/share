<?php

namespace ShareApp\Http\Controllers;

use Illuminate\Http\Request;

use ShareApp\Http\Requests;
use ShareApp\Http\Controllers\Controller;
use ShareApp\Http\Controllers\Auth\AuthController;

use ShareApp\Number;

class ProfileController extends Controller
{
    protected $user;

    public function __construct(){
        $this->middleware('auth');
        $this->user = auth()->user();
    }

    public function index(){
        return view('profile', [
            'user' => $this->user,
        ]);
    }

    public function update(Request $request){
        $validationRules = AuthController::validationData($this->user->id);
        unset($validationRules['password']);
        $this->validate($request, $validationRules);

        $dataRequest = $request->all();
        $dataRequest['password'] = '';
        $data = AuthController::userData($dataRequest);
        unset($data['password']);

        $this->user->update($data);

        fmsgs([
            'title' => 'Profile Updated',
            'type'  => 'success',
            'text'  => "Successfully updating your data",
        ]);

        return redirect()->back();
    }

    public function numbers(){
        return view('numbers', ['user' => $this->user]);
    }

    private function numberValidationRules(){
        return [
            'value' => 'required',
            'label' => 'required',
        ];
    }

    private function numberData(array $data){
        return [
            'value' => $data['value'],
            'label' => $data['label'],
        ];
    }

    public function numberCreate(Request $request){
        $this->validate($request, $this->numberValidationRules());

        $this->user->numbers()->create($this->numberData($request->all()));

        fmsgs([
            'title' => 'New Number Added',
            'type'  => 'success',
            'text'  => "Successfully adding a new Number",
        ]);

        return redirect()->back();
    }

    public function numberEdit(Number $number){
        $this->authorize('all', $number);
        return view('numbers.edit', ['number' => $number]);
    }

    public function numberUpdate(Request $request, Number $number){
        $this->authorize('all', $number);
        $this->validate($request, $this->numberValidationRules());
        $number->update($this->numberData($request->all()));

        fmsgs([
            'title' => 'Number Updated',
            'type'  => 'success',
            'text'  => "Successfully updating the Number",
        ]);

        return redirect()->back();
    }

    public function numberDelete(Number $number){
        $number->delete();
        fmsgs([
            'title' => 'Number Deleted',
            'type' => 'success',
            'text' => 'The '.$number->value.' ~ '
                .$number->label.' successfully deleted!',
        ]);
        return redirect()->back();
    }
}
