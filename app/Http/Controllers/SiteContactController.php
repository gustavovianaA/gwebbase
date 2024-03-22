<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class SiteContactController extends Controller
{
    public function index()
    {
        //if there is response for message sent them show it
        $responseMessage = $_GET['responseMessage'] ?? '';

        return view('site.contact', ['page' => 'contact', 'responseMessage' => $responseMessage]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'telephone' => 'required',
            'email' => 'required',
            'message' => 'required',
        ];

        $feedback = [
            'required' => 'O campo deve ser preenchido'
        ];

        $request->validate($rules, $feedback);

        $requestData = $request->all();

        Message::create($requestData);

        return redirect()->route('site.contact', ['responseMessage' => 'Obrigado! Sua mensagem foi enviada.']);

    }
}
