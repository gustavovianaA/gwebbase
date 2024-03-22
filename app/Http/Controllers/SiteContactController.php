<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Rules\ReCaptchaV3;

class SiteContactController extends Controller
{
    public function index()
    {
        return view('site.contact', ['page' => 'contact']);
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
            'g-recaptcha-response' => ['required', new ReCaptchaV3('submitContact')]
        ];

        $feedback = [
            'required' => 'O campo deve ser preenchido'
        ];

        $request->validate($rules, $feedback);

        $requestData = $request->all();

        Message::create($requestData);

        //return redirect()->route('site.contact', ['responseMessage' => 'Obrigado! Sua mensagem foi enviada.']);

        return redirect()->back()->with('responseMessage', 'Obrigado! Sua mensagem foi enviada.');

    }
}
