<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'street',
        'city', 'postal_code',
        'phone_number',
        'email',
        'nip'];

    public static function create(mixed $validated)
    {
        return self::create($validated);
    }


    public function getKeyType(): string
    {
        return 'string';
    }

    public function getIncrementing(): false
    {
        return false;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Book::class)->withPivot(['quantity']);
    }
}
