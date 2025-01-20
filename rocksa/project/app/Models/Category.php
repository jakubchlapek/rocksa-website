<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Tabela w bazie danych (opcjonalnie, jeśli nazwa tabeli nie jest "categories").
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * Pola, które mogą być masowo przypisywane.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'parent_id',
    ];
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function rocks()
    {
        return $this->hasMany(Rock::class);
    }

}
