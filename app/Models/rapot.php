<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rapot extends Model
{
    use HasFactory;
    protected $table = 'rapot';
    protected $fillable = [
        'mk',
        'nilai',
        'fk_user'
    ];
}
