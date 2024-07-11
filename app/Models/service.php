<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'title',
        'subtitle',
        'icon',
    
        ]; 

    public function getServiceUrlAttribute()
    {
        return asset('storage/' . $this->icon);
    }
}
