<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Ticket;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Ticket::whereNull('deleted_at')
        ->with(['raised', 'assignee', 'meeting_method', ])
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

        if($ticket = Ticket::create([
            
			'raised_id' => $request->raised_id,
			'assignee_id' => $request->assignee_id,
			'subject' => $request->subject,
			'status' => $request->status,
			'due_at' => $request->due_at,
			'meeting_method_id' => $request->meeting_method_id,
			'join_link' => $request->join_link,

        ])):
            return  $ticket;
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
        if($ticket = Ticket
            ::whereNull('deleted_at')
            ->->with(['raised', 'assignee', 'meeting_method', ])
            ->where('id', $id)->first()):
            return $ticket;
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

        if($ticket = Ticket::find($id)):
            
			$ticket->raised_id = $request->raised_id;
			$ticket->assignee_id = $request->assignee_id;
			$ticket->subject = $request->subject;
			$ticket->status = $request->status;
			$ticket->due_at = $request->due_at;
			$ticket->meeting_method_id = $request->meeting_method_id;
			$ticket->join_link = $request->join_link;

            $ticket->save();

            return  $ticket;
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
        if(Ticket::destroy($id)):
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
        if($ticket = Ticket::find($id)):

            $ticket->deleted_at = "'".date('Y-m-d h:i:s')."'";
            $ticket->save();

            return  $ticket;
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
        if($ticket = Ticket::find($id)):

            $ticket->deleted_at = null;
            $ticket->save();

            return  $ticket;
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
            
			'raised_id' => ['required'],
			'assignee_id' => ['required'],
			'subject' => ['required'],
			'status' => ['required'],
			'due_at' => ['required'],
			'meeting_method_id' => ['required'],
			'join_link' => ['required'],

        ]);

        if($validator->fails()) return false;
        return true;
    }
}