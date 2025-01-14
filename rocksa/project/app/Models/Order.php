<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @inheritdoc
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'street',
        'city', 'postal_code',
        'phone_number',
        'email',
        'nip'];

    public function getKeyType(): string
    {
        return 'string';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Rock::class);
    }
}
