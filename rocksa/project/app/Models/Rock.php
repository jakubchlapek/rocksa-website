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
    protected $fillable = ['title', 'description', 'main mineral', 'treatment', 'country of origin', 'weight', 'density', 'color', 'clarity', 'toughness', 'rarity', 'price'];

    public static function create(mixed $validated): Rock
    {
        return self::create($validated);
    }


    public function setTitleAttribute(string $value): void
    {
        $this->attributes['title'] = strtoupper($value);
    }

    public function setCountryOfOriginAttribute(string $value): void
    {
        $this->attributes['country_of_origin'] = ucfirst($value);
    }

    public function getPriceAttribute(float $value): string
    {
        return number_format($value, 2, '.');
    }

}

