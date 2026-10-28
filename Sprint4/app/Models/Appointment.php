<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    public $timestamps = false;

    protected $table = 'user_appo';
    protected $primaryKey = 'c_no';

    protected $fillable = [
        'c_no',
        'full_name',
        'email',
        'phn',
        'msg',
        'consultant_reply',
    ];
}
