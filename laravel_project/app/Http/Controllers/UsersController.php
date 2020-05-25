<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::whereNull('deleted_at')
        ->with(['role', 'enterprise', 'bank', ])
        ->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$this->validator($request)) {
            return [
                "success" => false,
                "message" => "form validation error"
            ];
        };

        // your code comes here

        if($user = User::create([
            
			'username' => $request->username,
			'firstname' => $request->firstname,
			'lastname' => $request->lastname,
			'phone' => $request->phone,
			'phone_alt' => $request->phone_alt,
			'email' => $request->email,
			'password' => $request->password,
			'administrative_function' => $request->administrative_function,
			'avatar' => $request->avatar,
			'role_id' => $request->role_id,
			'enterprise_id' => $request->enterprise_id,
			'bank_id' => $request->bank_id,

        ])):
            return  $user;
        else:
            return [
                "success" => false,
                "message" => "data not saved"
            ];
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($user = User
            ::whereNull('deleted_at')
            ->->with(['role', 'enterprise', 'bank', ])
            ->where('id', $id)->first()):
            return $user;
        else:
                return [
                    "success" => false,
                    "message" => "data not exists"
                ];
        endif;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if(!$this->validator($request)) {
            return [
                "success" => false,
                "message" => "form validation error"
            ];
        };

        // your code comes here

        if($user = User::find($id)):
            
			$user->username = $request->username;
			$user->firstname = $request->firstname;
			$user->lastname = $request->lastname;
			$user->phone = $request->phone;
			$user->phone_alt = $request->phone_alt;
			$user->email = $request->email;
			$user->password = $request->password;
			$user->administrative_function = $request->administrative_function;
			$user->avatar = $request->avatar;
			$user->role_id = $request->role_id;
			$user->enterprise_id = $request->enterprise_id;
			$user->bank_id = $request->bank_id;

            $user->save();

            return  $user;
        else:
            return [
                "success" => false,
                "message" => "data not updated"
            ];
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(User::destroy($id)):
            return [
                "success" => true,
                "message" => "data destoyed"
            ];
        else:
            return [
                "success" => false,
                "message" => "data not destoyed"
            ];
        endif;
    }

    /**
     * Soft delete the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function desactivate($id)
    {
        if($user = User::find($id)):

            $user->deleted_at = "'".date('Y-m-d h:i:s')."'";
            $user->save();

            return  $user;
        else:
            return [
                "success" => false,
                "message" => "data not updated"
            ];
        endif;
    }

    /**
     * Soft delete the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activate($id)
    {
        if($user = User::find($id)):

            $user->deleted_at = null;
            $user->save();

            return  $user;
        else:
            return [
                "success" => false,
                "message" => "data not updated"
            ];
        endif;
    }

    /**
     * Get a validator for an incoming request.
     *
     * @param  array  $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Request $request)
    {
        $validator = Validator::make($request->all(), [
            
			'username' => ['required'],
			'firstname' => ['required'],
			'lastname' => ['required'],
			'phone' => ['required'],
			'phone_alt' => ['required'],
			'email' => ['required'],
			'password' => ['required'],
			'administrative_function' => ['required'],
			'avatar' => ['required'],
			'role_id' => ['required'],
			'enterprise_id' => ['required'],
			'bank_id' => ['required'],

        ]);

        if($validator->fails()) return false;
        return true;
    }
}