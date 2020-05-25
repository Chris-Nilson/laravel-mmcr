<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Enterprise;

class EnterprisesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Enterprise::whereNull('deleted_at')
        ->with(['partners', 'smes', 'users', ])
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

        if($enterprise = Enterprise::create([
            
			'name' => $request->name,
			'logo' => $request->logo,
			'address' => $request->address,
			'phone' => $request->phone,
			'phone_alt' => $request->phone_alt,
			'email' => $request->email,
			'email_alt' => $request->email_alt,

        ])):
            return  $enterprise;
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
        if($enterprise = Enterprise
            ::whereNull('deleted_at')
            ->->with(['partners', 'smes', 'users', ])
            ->where('id', $id)->first()):
            return $enterprise;
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

        if($enterprise = Enterprise::find($id)):
            
			$enterprise->name = $request->name;
			$enterprise->logo = $request->logo;
			$enterprise->address = $request->address;
			$enterprise->phone = $request->phone;
			$enterprise->phone_alt = $request->phone_alt;
			$enterprise->email = $request->email;
			$enterprise->email_alt = $request->email_alt;

            $enterprise->save();

            return  $enterprise;
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
        if(Enterprise::destroy($id)):
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
        if($enterprise = Enterprise::find($id)):

            $enterprise->deleted_at = "'".date('Y-m-d h:i:s')."'";
            $enterprise->save();

            return  $enterprise;
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
        if($enterprise = Enterprise::find($id)):

            $enterprise->deleted_at = null;
            $enterprise->save();

            return  $enterprise;
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
            
			'name' => ['required'],
			'logo' => ['required'],
			'address' => ['required'],
			'phone' => ['required'],
			'phone_alt' => ['required'],
			'email' => ['required'],
			'email_alt' => ['required'],

        ]);

        if($validator->fails()) return false;
        return true;
    }
}