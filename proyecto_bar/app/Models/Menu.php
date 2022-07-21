<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public function bar()
    {
    return $this->belongsTo(Bar::class);
    }
    public function preferencia()
    {
    return $this->hasMany(Preferencia::class);
    }
    
}
