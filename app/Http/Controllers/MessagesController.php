<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use Illuminate\Http\Request;
use App\Http\Requests\MessageFormRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use App\Mail\MessageCreated;

class MessagesController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessageFormRequest $request)
    {
        $message =  Messages::create($request->only('firstName', 'lastName', 'email', 'phone', 'content'));

        Mail::to('noreplay@gmail.com')->send(new MessageCreated($message));

        return Redirect::route('homepage');
    }

}
