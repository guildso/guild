<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'status',
    ];

    public function team()
    {
        return $this->belongsTo('App\Models\Team');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
