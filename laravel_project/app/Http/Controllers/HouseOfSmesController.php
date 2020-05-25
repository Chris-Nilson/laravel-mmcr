<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\HouseOfSme;

class HouseOfSmesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return HouseOfSme::whereNull('deleted_at')
        ->with([])
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

        if($houseOfSme = HouseOfSme::create([
            
			'name' => $request->name,
			'address' => $request->address,
			'phone' => $request->phone,
			'phone_alt' => $request->phone_alt,
			'email' => $request->email,
			'email_alt' => $request->email_alt,

        ])):
            return  $houseOfSme;
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
        if($houseOfSme = HouseOfSme
            ::whereNull('deleted_at')
            ->->with([])
            ->where('id', $id)->first()):
            return $houseOfSme;
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

        if($houseOfSme = HouseOfSme::find($id)):
            
			$houseOfSme->name = $request->name;
			$houseOfSme->address = $request->address;
			$houseOfSme->phone = $request->phone;
			$houseOfSme->phone_alt = $request->phone_alt;
			$houseOfSme->email = $request->email;
			$houseOfSme->email_alt = $request->email_alt;

            $houseOfSme->save();

            return  $houseOfSme;
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
        if(HouseOfSme::destroy($id)):
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
        if($houseOfSme = HouseOfSme::find($id)):

            $houseOfSme->deleted_at = "'".date('Y-m-d h:i:s')."'";
            $houseOfSme->save();

            return  $houseOfSme;
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
        if($houseOfSme = HouseOfSme::find($id)):

            $houseOfSme->deleted_at = null;
            $houseOfSme->save();

            return  $houseOfSme;
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