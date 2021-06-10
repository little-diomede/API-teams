<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    protected $fillable = [
        'username', 'playernumber', 'starter', 'joined', 'href','name', 'teams_id'
    ];

    /*protected $with = ['players'];

    public function teams(){
        return $this->hasMany(Player::class);
    }
    */
}
