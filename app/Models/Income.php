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
        'user_id',
        'description',
        'value',
        'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
