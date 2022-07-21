<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Bar extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public function menu()
    {
    return $this->hasMany(Menu::class);
    }
    public function snack()
    {
    return $this->hasMany(Snack::class);
    }
    public function campus()
    {
    return $this->belongsTo(Campus::class);
    }
    
    
}