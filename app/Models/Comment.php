<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Comment extends Model
{
    use softDeletes;
    protected $fillable = [
        'user_id',
        'question_id',
        'comment'
    ];
}