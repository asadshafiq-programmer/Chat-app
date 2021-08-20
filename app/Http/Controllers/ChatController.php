<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Pusher\Pusher;

class ChatController extends Controller
{

    public $pusher;

    public function __construct()
    {

        $options = array(
            'cluster' => 'ap2',
            'useTLS' => true
        );

        $this->pusher = new Pusher(
            '8d4603372fd78ded0879',
            '3882b46ed0371a3aef57',
            '1234644',
            $options
          );
    }

    public function send(Request $request)
    {

        Message::create([
            'from_id' => $request->user()->id,
            'to_id' => $request->to_id,
            'message' => $request->message,
        ]);
        $data['to_id'] = '1';
        $this->pusher->trigger('my-channel', 'my-event', $data);
    }
}
