<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubmitAssignmentController extends Controller
{
    public function index() {
        return view('SubmitAssignment');
    }
    public function SubmitAssignment(Request $request) {
    }
}
