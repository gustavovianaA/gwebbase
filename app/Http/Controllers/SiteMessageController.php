<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class SiteMessageController extends Controller
{

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
