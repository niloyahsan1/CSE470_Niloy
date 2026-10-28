<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    public $timestamps = false;

    protected $table = 'profile';

    protected $fillable = [
        'id',
        'email',
        'age',
        'height',
        'current_weight',
        'gender',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }
}
