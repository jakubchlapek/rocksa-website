<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rock extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @inheritdoc
     */
    protected $fillable = ['user_id', 'title', 'description', 'main_mineral', 'treatment', 'country_of_origin', 'weight', 'density', 'color', 'clarity', 'toughness', 'rarity', 'price'];


}

