<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function tailor()
    {
        return $this->hasOne(Tailor::class,'id','tailor_id');
    }
}
