<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutomobileTips extends Model
{
    use HasFactory;

    protected $table = 'automobile_tips';

    public $timestamps = false;

    protected $fillable = [
        'automobile_id',
        'tips_id'
    ];
}
