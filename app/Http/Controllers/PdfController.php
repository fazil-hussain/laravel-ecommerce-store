<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use DB;
use PDF;

    class PdfController extends Controller
        {
            public function showorder(){
            $employee = Order::all();
            return view('admin.pdfview', compact('employee'));
            }
        }

