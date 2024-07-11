<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'title',
        'creator',
        'like',
        'comment',
        'subtitle',
        'image',
    
        ]; 

    public function getBlogUrlAttribute()
    {
        return asset('storage/' . $this->image);
    }
}
