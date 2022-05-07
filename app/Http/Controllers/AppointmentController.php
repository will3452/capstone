<?php

namespace App\Http\Controllers;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = auth()->user()->appointments()->latest()->get();
        return view('appointment', compact('appointments'));
    }
}
