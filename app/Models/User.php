<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

// models
use App\Models\Whine;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'whine_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function whines()
    {
        return $this->hasMany(Whine::class);
    }

    public function sympathy_whines()
    {
        return $this->belongsToMany(Whine::class,'sympathys','user_id','whine_id');
    }

    public function add_sympathy($whineId){
        // 自分の投稿かどうか
        $its_mine=$this->id === $whineId;
        //すでに共感しているか
        $exists=$this->is_sympathyed($whineId);
        if($its_mine || $exists){
            //自分の投稿　若しくは　すでに共感している場合
            return false;
        }else{
            $this->sympathy_whines()->attach($whineId);
            return true;
        }
    }

    public function remove_sympathy($whineId)
    {
        // 自分の投稿かどうか
        $its_mine=$this->id === $whineId;
        //すでに共感しているか
        $exists=$this->is_sympathyed($whineId);
        if($exists && !$its_mine){
            $this->sympathy_whines()->detach($whineId);
            return true;
        }else{
            return false;
        }
    }

    public function is_sympathyed($whineId)
    {
        return $this->sympathy_whines()->where('whine_id','=',$whineId)->exists();
    }
}
