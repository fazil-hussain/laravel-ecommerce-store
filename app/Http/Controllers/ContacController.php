<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContacController extends Controller
{
    public function contactpage()
    {
        return view('site.contactus');
    }
   public function contactus(Request $resquest){
        Contact::create($resquest->all());
        return redirect()->back();
        toastr()->success('Your Msg Sent');
   }
}
