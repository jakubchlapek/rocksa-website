<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content', 'rock_id', 'user_id'];
    public function user()
    {

        return $this-> belongsTo(User::class);

    }

    public function rock(){

        return $this -> belongsTo(Rock::class);

    }
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
