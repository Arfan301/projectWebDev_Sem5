<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;

    protected $table = 'reserves';

    protected $fillable = [
        'Name',
        'No_Telp',
        'Reservation_Date',
        'Number_Of_Guest',
        'user_id',
    ];
}
