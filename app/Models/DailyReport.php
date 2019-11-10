<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class DailyReport extends Model
{
    use softDeletes;
    protected $dates = [
        'reporting_time'
    ];

    protected $fillable = [
        'user_id',
        'reporting_time',
        'title',
        'content'
    ];

    public function scopeGetDailyReport($query, $data)
    {
        return $query->where('reporting_time', 'LIKE', $data->get('search-month'). '%');
    }
}
