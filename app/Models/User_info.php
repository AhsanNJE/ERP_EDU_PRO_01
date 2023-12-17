<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_info extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function categoryName(){
        return $this->belongsTo(User_Category::class,'category_id','id');
    }
}
