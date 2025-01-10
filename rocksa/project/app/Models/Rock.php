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
    protected $fillable = ['title', 'description', 'main mineral', 'treatment', 'country of origin',
    'weight', 'density', 'color', 'clarity', 'toughness', 'rarity', 'price'];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = strtoupper($value);
    }

    public function setCountryOfOriginAttribute($value)
    {
        $this->attributes['country_of_origin'] = ucfirst($value);
    }

    public function getPriceAttribute($value)
    {
        return number_format($value, 2, '.', '');
    }

}

