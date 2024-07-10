<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class about extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'text1',
        'title',
        'subtitle',
        'file_path',
    
        ]; 

    public function getAboutUrlAttribute()
    {
        return asset('storage/' . $this->file_path);
    }

}
