<?php

namespace Edgar\PMT\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Mail\Mailer;

class EmailController extends Controller
{
    public function send(Request $request){
        $title = $request->input('title');
        $to = $request->input('to');
        $content = $request->input('content');
        //Grab uploaded file
        $attach = $request->file('file');
        dd($request);
        \Mail::send('emails.send', ['title' => $title, 'content' => $content], function ($message, $to)
        {

            $message->from('hnrdiaz@gmail.com', 'Backend PMT El Estor INSIDE');

            $message->to($to);

            //Attach file
            // $message->attach($attach);

            //Add a subject
            $message->subject("Hola desde Backend PMT El Estor");

        });


        return response()->json(['message' => 'Request completed']);
    }
}
