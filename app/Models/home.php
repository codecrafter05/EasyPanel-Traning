<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class home extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        
        
        'title',
        'subtitle',
        'file_path',
        'counter_number1',
        'counter_text1',
        'counter_number2',
        'counter_text2',
        'counter_number3',
        'counter_text3',
        'counter_number4',
        'counter_text4'
            

        ]; // Ensure this is fillable

    public function getHomeUrlAttribute()
    {
        return asset('storage/' . $this->file_path);
    }
}
