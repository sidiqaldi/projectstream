<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        'name',
        'started_at',
        'ended_at',
    ];

    protected $dates = [
        'started_at',
        'ended_at',
        'created_at',
        'updated_at',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
