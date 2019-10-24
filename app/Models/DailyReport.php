<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DailyReport extends Model
{
    use softDeletes;
    //
    protected $dates = [
        'reporting_time'
    ];

    protected $fillable = [
        'user_id',
        'reporting_time',
        'title',
        'content'
    ];
}
