<?php

namespace App\Models;

use App\Http\Requests\DeliveryAddressRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryAddress extends Model
{
    use HasFactory;

    protected $table = 'delivery_addresses';

    protected $fillable = [
        'region',
        'locality',
        'street',
        'house',
        'index',
        'user_id'
    ];
}
