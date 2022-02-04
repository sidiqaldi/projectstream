<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = ['name'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
