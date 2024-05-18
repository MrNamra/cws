<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\assignments;
use App\Models\collages;
use App\Models\departments;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('admin.dashboard');
    }
    public function contact() {
        return view('ContactUs');
    }
    public function getdep(Request $req) {
        $req->validate([ 'clg_id' => 'required|numeric']);
        $dep = departments::where('clg_id', $req->input('clg_id'))->get();
        return json_encode(['deps'=> $dep]);
    }
    public function AddForms() {
        $ass = assignments::get();
        $clgs = collages::get();
        
        foreach ($ass as $assignment) {
            // Accessing the collage and department data directly through the relationships
            $assignment->clg = $clgs->find($assignment->clg_id);
            $assignment->dep = departments::find($assignment->dep_id);
        }
        
        return view('admin.AddNewForms', ['clgs'=> $clgs, 'assignment'=>$ass]);
    }

    public function getAllDetailsById(Request $req) {
        $req->validate(['id'=>'required|numeric']);
        $ass = assignments::find($req->id);
        $ass->dep = departments::select('id','short_name','full_name')->find($ass->dep_id);
        $ass->clg = collages::select('id','short_name','full_name')->find($ass->clg_id);
        
        return response(json_encode($ass));
    }


    public function PostNews() {
        return view('admin.PostNews');
    }
    public function ShowSubmitAssignment() {
        return view('admin.showSubbmitAssignment', ['mess'=> 'yes']);
    }
}
