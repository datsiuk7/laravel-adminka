<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Fields\BelongsTo;

class Profile extends Model
{
    use HasFactory;



    protected $fillable = [
        'id',
        'user_id',
        'name',
        'body',
        'year_old',
        'birthday_at',
    ];

    protected $casts = [
        'birthday_at' => 'date'
    ];

    public function phone()
    {
        return $this->hasOne(User::class);
    }
}
