<?php

namespace App\Http\Controllers;

use App\Models\assignments;
use App\Models\collages;
use App\Models\departments;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index() {
        $clg = collages::get();
        return view('welcome', ['clgs'=>$clg, 'i' => 1]);
    }
    function departments($clg_name) {
        $clg = collages::where('short_name', $clg_name)->first();
        if($clg){
            $department = departments::where('clg_id',$clg['id'])->get();
            if($department->count() == 1){
                return redirect(url($clg_name.'/'.$department[0]->short_name));
            }else{
                return view('departments', ['deps'=>$department, 'clg_name'=>$clg_name]);
            }
        }
        return redirect(url('/'));
    }
    function assignments($clg_name, $dep_name) {
        $clg = collages::where('short_name', $clg_name)->first();
        if($clg){
            $dep = departments::where('clg_id',$clg['id'])->where('short_name',$dep_name)->first();
            $ass = assignments::where('clg_id', $clg['id'])->where('dep_id', $dep['id'])->get();
            return view('assignment', ['asses'=> $ass, 'i' => 1]);
        }
        return redirect('/');
    }
    function news() {
        return "Hello";
    }
}
