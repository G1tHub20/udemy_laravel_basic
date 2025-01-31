<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    public function area()
    {
        return $this->belongsTo(Area::class); // リレーション 多対1
    }

    public function routes()
    {
        return $this->belongsToMany(Route::class); // リレーション 多対多
    }
}
