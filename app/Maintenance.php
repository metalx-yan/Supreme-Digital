<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = ['no','name','perihal', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
