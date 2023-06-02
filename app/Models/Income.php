<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Income extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'income'; 

    protected $fillable = [
        'id',
        'description',
        'value',
        'date',
    ];
}
