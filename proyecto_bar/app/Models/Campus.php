<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campus extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public function bar()
    {
    return $this->hasMany(Bar::class);
    }
    public function menu()
    {
    return $this->hasMany(Menu::class);
    }
    
}