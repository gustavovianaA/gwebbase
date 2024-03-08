<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteContactController extends Controller
{
    public function index()
    {
        //if there is response for message sent them show it
        $responseMessage = $_GET['responseMessage'] ?? '';
        
        //variables to avoid spam on the form
        $confirm['first'] = rand(1,9);
        $confirm['second'] = rand(1,9);
        $confirm['third'] = $confirm['first'] + $confirm['second'];
        
        return view('site.contact', ['page' => 'contact' , 'confirm' => $confirm , 'responseMessage' => $responseMessage]);
    }
}
