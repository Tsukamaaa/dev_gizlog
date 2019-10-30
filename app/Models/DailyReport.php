<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public function getByUserId($id)
    {
        return $this->where('user_id', $id)->get();
    }

    public function getByYearAndMonth($time)
    {
        return $this->where('reporting_time', 'LIKE', '%'.$time.'%')->get();
    }
}
