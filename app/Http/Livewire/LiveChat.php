<?php

namespace App\Http\Livewire;

use App\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Pusher\Pusher;

class LiveChat extends Component
{
    public $text;
    public function mount()
    {
        $this->text="";
    }

    public function increment()
    {
       dd('yes');
    }


    public function render()
    {
        $messages = Message::get();
        return view('livewire.live-chat',['messages' => $messages]);
    }
}
