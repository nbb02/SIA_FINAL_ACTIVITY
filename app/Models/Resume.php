<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    //
    protected $fillable = [
        'image',
        'name',
        'birthday',
        'contact',
        'email',
        'address',
        'education',
        'skills',
    ];

    protected $casts = [
        'education' => 'array',
        'skills' => 'array',
    ];
}
