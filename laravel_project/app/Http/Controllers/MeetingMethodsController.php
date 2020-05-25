<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\MeetingMethod;

class MeetingMethodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MeetingMethod::whereNull('deleted_at')
        ->with(['activities', 'tickets', ])
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

        if($meetingMethod = MeetingMethod::create([
            
			'name' => $request->name,
			'logo' => $request->logo,
			'description' => $request->description,
			'contact' => $request->contact,

        ])):
            return  $meetingMethod;
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
        if($meetingMethod = MeetingMethod
            ::whereNull('deleted_at')
            ->->with(['activities', 'tickets', ])
            ->where('id', $id)->first()):
            return $meetingMethod;
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

        if($meetingMethod = MeetingMethod::find($id)):
            
			$meetingMethod->name = $request->name;
			$meetingMethod->logo = $request->logo;
			$meetingMethod->description = $request->description;
			$meetingMethod->contact = $request->contact;

            $meetingMethod->save();

            return  $meetingMethod;
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
        if(MeetingMethod::destroy($id)):
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
        if($meetingMethod = MeetingMethod::find($id)):

            $meetingMethod->deleted_at = "'".date('Y-m-d h:i:s')."'";
            $meetingMethod->save();

            return  $meetingMethod;
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
        if($meetingMethod = MeetingMethod::find($id)):

            $meetingMethod->deleted_at = null;
            $meetingMethod->save();

            return  $meetingMethod;
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
			'description' => ['required'],
			'contact' => ['required'],

        ]);

        if($validator->fails()) return false;
        return true;
    }
}