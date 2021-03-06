<?php

namespace App\Models;

use App\Traits\ApiResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

/**
 * @property int user_id
 * @property User user
 */
class Task extends Model
{
    use HasFactory, ApiResource;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function stage(): BelongsTo
    {
        return $this->belongsTo(Stage::class);
    }

    public function project(): HasOneThrough
    {
        return $this->hasOneThrough(Project::class, Stage::class, 'id', 'id', 'stage_id', 'project_id');
    }
}
