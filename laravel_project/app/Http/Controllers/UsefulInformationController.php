<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\UsefulInformation;

class UsefulInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UsefulInformation::whereNull('deleted_at')
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

        if($usefulInformation = UsefulInformation::create([
            
			'title' => $request->title,
			'cover_image' => $request->cover_image,
			'content' => $request->content,

        ])):
            return  $usefulInformation;
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
        if($usefulInformation = UsefulInformation
            ::whereNull('deleted_at')
            ->->with([])
            ->where('id', $id)->first()):
            return $usefulInformation;
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

        if($usefulInformation = UsefulInformation::find($id)):
            
			$usefulInformation->title = $request->title;
			$usefulInformation->cover_image = $request->cover_image;
			$usefulInformation->content = $request->content;

            $usefulInformation->save();

            return  $usefulInformation;
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
        if(UsefulInformation::destroy($id)):
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
        if($usefulInformation = UsefulInformation::find($id)):

            $usefulInformation->deleted_at = "'".date('Y-m-d h:i:s')."'";
            $usefulInformation->save();

            return  $usefulInformation;
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
        if($usefulInformation = UsefulInformation::find($id)):

            $usefulInformation->deleted_at = null;
            $usefulInformation->save();

            return  $usefulInformation;
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
            
			'title' => ['required'],
			'cover_image' => ['required'],
			'content' => ['required'],

        ]);

        if($validator->fails()) return false;
        return true;
    }
}