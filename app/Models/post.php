<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    
    protected $fillable = ['id','title','user-id', 'image', 'discripsion'];

    public function user(){
        return $this->belongsTo(user::class,'user_id');
    }
}