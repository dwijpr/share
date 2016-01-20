<?php

namespace ShareApp\Http\Controllers;

use Illuminate\Http\Request;

use ShareApp\Http\Requests;
use ShareApp\Http\Controllers\Controller;
use ShareApp\Http\Controllers\Auth\AuthController;

use ShareApp\User;
use ShareApp\Number;

use Validator;
use Hash;

class ProfileController extends Controller
{
    protected $user;

    public function __construct(){
        parent::__construct();
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

        User::where('id', $this->user->id)->update($data);

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

    public function passwordChange(){
        return view('auth.passwords.change');
    }

    public function passwordUpdate(Request $request){
        $validationRules = AuthController::validationData($this->user->id);
        unset($validationRules['name']);
        unset($validationRules['email']);
        unset($validationRules['gender']);
        $validator = Validator::make($request->all(), $validationRules);

        $validator->after(function($validator) use ($request){
            if(!Hash::check( $request->current, $this->user->password )){
                $validator->errors()->add(
                    'current', 'Your current password is incorrect'
                );
            }
        });

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $dataRequest = $request->all();
        $dataRequest['name'] = '';
        $dataRequest['email'] = '';
        $dataRequest['gender'] = '';
        $data = AuthController::userData($dataRequest);
        unset($data['name']);
        unset($data['email']);
        unset($data['gender']);

        User::where('id', $this->user->id)->update($data);

        fmsgs([
            'title' => 'Password Updated',
            'type'  => 'success',
            'text'  => "Successfully updating your password",
        ]);

        return redirect('profile');
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
