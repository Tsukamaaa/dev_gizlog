<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Question extends Model
{
    use softDeletes;
    protected $dates = [
        //いったん保留、defaultの日付の形を決めるかどうか
    ];

    protected $fillable = [
        'user_id',
        'tag_category_id',
        'title',
        'content'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

