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

        //variables to avoid spam on the form
        $confirm['first'] = rand(1, 9);
        $confirm['second'] = rand(1, 9);
        $confirm['third'] = $confirm['first'] + $confirm['second'];

        return view('site.contact', ['page' => 'contact', 'confirm' => $confirm, 'responseMessage' => $responseMessage]);
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
            'response' => 'required',
            'target' => 'required'
        ];

        $feedback = [
            'required' => 'O campo deve ser preenchido'
        ];



        $request->validate($rules, $feedback);

        $requestData = $request->all();

        if ($requestData['response'] === $requestData['target']) {
            Message::create($requestData);

            return redirect()->route('site.contact', ['responseMessage' => 'Obrigado! Sua mensagem foi enviada.']);
        }

        return redirect()->route('site.contact');
    }
}
