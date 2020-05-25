<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\BusinessSector;

class BusinessSectorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BusinessSector::whereNull('deleted_at')
        ->with(['smes', ])
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

        if($businessSector = BusinessSector::create([
            
			'name' => $request->name,
			'description' => $request->description,

        ])):
            return  $businessSector;
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
        if($businessSector = BusinessSector
            ::whereNull('deleted_at')
            ->->with(['smes', ])
            ->where('id', $id)->first()):
            return $businessSector;
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

        if($businessSector = BusinessSector::find($id)):
            
			$businessSector->name = $request->name;
			$businessSector->description = $request->description;

            $businessSector->save();

            return  $businessSector;
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
        if(BusinessSector::destroy($id)):
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
        if($businessSector = BusinessSector::find($id)):

            $businessSector->deleted_at = "'".date('Y-m-d h:i:s')."'";
            $businessSector->save();

            return  $businessSector;
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
        if($businessSector = BusinessSector::find($id)):

            $businessSector->deleted_at = null;
            $businessSector->save();

            return  $businessSector;
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
			'description' => ['required'],

        ]);

        if($validator->fails()) return false;
        return true;
    }
}