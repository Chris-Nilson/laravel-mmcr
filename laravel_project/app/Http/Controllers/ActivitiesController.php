<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Activity;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Activity::whereNull('deleted_at')
        ->with(['meeting_method', 'activity_resources', ])
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

        if($activity = Activity::create([
            
			'name' => $request->name,
			'cover_image' => $request->cover_image,
			'description' => $request->description,
			'start' => $request->start,
			'end' => $request->end,
			'meeting_method_id' => $request->meeting_method_id,
			'join_link' => $request->join_link,

        ])):
            return  $activity;
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
        if($activity = Activity
            ::whereNull('deleted_at')
            ->->with(['meeting_method', 'activity_resources', ])
            ->where('id', $id)->first()):
            return $activity;
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

        if($activity = Activity::find($id)):
            
			$activity->name = $request->name;
			$activity->cover_image = $request->cover_image;
			$activity->description = $request->description;
			$activity->start = $request->start;
			$activity->end = $request->end;
			$activity->meeting_method_id = $request->meeting_method_id;
			$activity->join_link = $request->join_link;

            $activity->save();

            return  $activity;
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
        if(Activity::destroy($id)):
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
        if($activity = Activity::find($id)):

            $activity->deleted_at = "'".date('Y-m-d h:i:s')."'";
            $activity->save();

            return  $activity;
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
        if($activity = Activity::find($id)):

            $activity->deleted_at = null;
            $activity->save();

            return  $activity;
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
			'cover_image' => ['required'],
			'description' => ['required'],
			'start' => ['required'],
			'end' => ['required'],
			'meeting_method_id' => ['required'],
			'join_link' => ['required'],

        ]);

        if($validator->fails()) return false;
        return true;
    }
}