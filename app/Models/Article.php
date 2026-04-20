<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'subtitle',
        'body',
        'image',
        'user_id',
        'category_id',
        'revisor_id',
        'is_accepted',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function revisor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'revisor_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
