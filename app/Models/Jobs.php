<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;


    protected $table = 'jobs';
    protected $fillable = ['title', 'slug', 'body', 'price' , 'user_id' , 'category_id'];

    public function User(){
        return $this->belongsTo(User::class);
    }
    
    function userName(){
        return $this->hasOne('App\Models\User','id','user_id');
    }

    function JobCategory(){
        return $this->hasOne('App\Models\JobCategory','id','category_id');
    }
    
    
}
