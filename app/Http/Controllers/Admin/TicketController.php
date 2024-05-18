<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\assignments;
use App\Models\collages;
use App\Models\departments;
use App\Models\feedbacks;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function ShowReport() {
        $open_tic = feedbacks::where('type', '0')->get();
        $close_tic = feedbacks::where('type', '1')->get();
        foreach($open_tic as $open){
            $open->clg = collages::select('short_name')->find($open->clg_id);
            $open->dep = departments::select('short_name')->find($open->dep_id);
        }
        foreach($close_tic as $close){
            $close->clg = collages::select('short_name')->find($close->clg_id);
            $close->dep = departments::select('short_name')->find($close->dep_id);
        }
        return view('admin/report', ['opens'=>$open_tic, 'closes'=>$close_tic]);
    }
    public function CreateTicket(Request $request) {
        $request->validate([
            'id' => 'required|string|max:6',
            'title' => 'required|string',
            'description' => 'required|string',
            'email' => 'nullable|string',
            'name' => 'nullable|string',
        ]);
        $assignment = assignments::select('id', 'clg_id', 'dep_id')->where('ucode', $request->input('id'))->first();
        $dep=null;
        $clg=null;
        if($assignment){
            $clg = collages::select('id', 'full_name', 'short_name')->find($assignment->clg_id);
            $dep = collages::select('id', 'full_name', 'short_name')->find($assignment->dep_id);

            $create_ticet = new feedbacks();
            $create_ticet->clg_id = $clg->id;
            $create_ticet->dep_id = $dep->id;
            $create_ticet->ass_id = $assignment->id;
            $create_ticet->sender_name = $request->input('name');
            $create_ticet->sender_email = $request->input('email');
            $create_ticet->title = $request->input('title');
            $create_ticet->dec = $request->input('description');
            $create_ticet->type = 0; //0 = open

            $create_ticet->save();
            return response(json_encode(['type'=>'success' ,'message'=>'Report Submit SuccessFully!']));
        }
        return response(json_encode(['type'=>'fail' ,'message'=>'Report Submit Fail! Refresh the and try again!']));
    }
    public function CloseReport(Request $request){
        $request->validate([ 'id' => 'required|numeric', ]);
        $status = feedbacks::find($request->input('id'))
            ->update([
                'type'=>1
            ]);
        if($status){
            return response(json_encode(['type'=>'success']));
        }
        return response(json_encode(['type'=>'fail', 'message'=>'Fail to Close Ticket!']));
    }
}
