<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function ShowReport() {
        return view('admin/report');
    }
    public function CreateTicket(Request $request) {
        $request->validate([
            'id' => 'required|string|max:6',
            'title' => 'required|string',
            'description' => 'required|string',
            'contect' => 'nullable|string',
        ]);
        
    }
}
