<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'from_id', 'to_id', 'message',
    ];

    public function from()
    {
        return $this->belongsTo(User::class,'from_id');
    }

    public function to()
    {
        return $this->belongsTo(User::class,'to_id');
    }
}
