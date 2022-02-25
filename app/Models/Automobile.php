<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Automobile extends Model
{
    use HasFactory;

    protected $table = "automobiles";

    protected $fillable = [
        'mark',
        'model',
        'version'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'automobile_categories');
    }

    public function tips()
    {
        return $this->belongsToMany(Tips::class, 'automobile_tips');
    }
}
