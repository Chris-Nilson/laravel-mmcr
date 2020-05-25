<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Sme;

class SmesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Sme::whereNull('deleted_at')
        ->with(['enterprise', 'business_sector', 'experience_range', 'turnover_range', ])
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

        if($sme = Sme::create([
            
			'enterprise_id' => $request->enterprise_id,
			'business_sector_id' => $request->business_sector_id,
			'business_sector_as_defined' => $request->business_sector_as_defined,
			'rccm' => $request->rccm,
			'experience_range_id' => $request->experience_range_id,
			'turnover_range_id' => $request->turnover_range_id,
			'need_support_for' => $request->need_support_for,
			'image_copyright' => $request->image_copyright,

        ])):
            return  $sme;
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
        if($sme = Sme
            ::whereNull('deleted_at')
            ->->with(['enterprise', 'business_sector', 'experience_range', 'turnover_range', ])
            ->where('id', $id)->first()):
            return $sme;
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

        if($sme = Sme::find($id)):
            
			$sme->enterprise_id = $request->enterprise_id;
			$sme->business_sector_id = $request->business_sector_id;
			$sme->business_sector_as_defined = $request->business_sector_as_defined;
			$sme->rccm = $request->rccm;
			$sme->experience_range_id = $request->experience_range_id;
			$sme->turnover_range_id = $request->turnover_range_id;
			$sme->need_support_for = $request->need_support_for;
			$sme->image_copyright = $request->image_copyright;

            $sme->save();

            return  $sme;
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
        if(Sme::destroy($id)):
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
        if($sme = Sme::find($id)):

            $sme->deleted_at = "'".date('Y-m-d h:i:s')."'";
            $sme->save();

            return  $sme;
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
        if($sme = Sme::find($id)):

            $sme->deleted_at = null;
            $sme->save();

            return  $sme;
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
            
			'enterprise_id' => ['required'],
			'business_sector_id' => ['required'],
			'business_sector_as_defined' => ['required'],
			'rccm' => ['required'],
			'experience_range_id' => ['required'],
			'turnover_range_id' => ['required'],
			'need_support_for' => ['required'],
			'image_copyright' => ['required'],

        ]);

        if($validator->fails()) return false;
        return true;
    }
}