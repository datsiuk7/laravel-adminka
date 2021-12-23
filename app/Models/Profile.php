<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Fields\BelongsTo;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Profile extends Model
{
    use HasFactory;
    use SortableTrait;

    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
    ];

    protected $fillable = [
        'id',
        'user_id',
        'name',
        'body',
        'year_old',
        'birthday_at',
        'sort_order',
    ];

    protected $casts = [
        'birthday_at' => 'date'
    ];

    public function phone()
    {
        return $this->hasOne(User::class);
    }
}
