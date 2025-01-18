<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'street',
        'city',
        'postal_code',
        'phone_number',
        'email'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItems::class);
    }
}
