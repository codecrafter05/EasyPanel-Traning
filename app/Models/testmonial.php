<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class testmonial extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'name',
        'comment',
        'image',
    
        ]; 

    public function getTestmonialUrlAttribute()
    {
        return asset('storage/' . $this->image);
    }
}
