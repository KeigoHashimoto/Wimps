<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//models
use App\Models\User;

class Whine extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'whine',
        'ip',
    ];

    protected $table = "whines";

    public function user(){
        return $this->belongsTo(User::class);
    }
}
