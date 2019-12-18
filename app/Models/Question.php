<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\TagCategory;
use App\Models\Comment;

class Question extends Model
{
    use softDeletes;
    protected $dates = [
        'created_at'
    ];

    protected $fillable = [
        'id',
        'user_id',
        'tag_category_id',
        'title',
        'content'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tag_category()
    {
        return $this->belongsTo(TagCategory::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeGetTagCategory($query, $request)
    {
        if (!empty($request->input('tag_category_id'))) {
            $query->where('tag_category_id', $request->input('tag_category_id'));
        }
        return $query;
    }

    public function scopeSearchWord($query, $request)
    {
        if (!empty($request->input('search_word'))) {
            $query->where('title', 'LIKE', '%'.$request->input('search_word').'%');
        }
    }
}
