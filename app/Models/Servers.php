<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Servers extends Model
{
    use HasFactory;

    protected $fillable = [
        'name' ,
        'host',
        'server_username',
        'server_password',
        'port',
        'status',
        'panel_username',
        'panel_password'
    ];


    public function backup() : HasOne
    {
        return $this->hasOne(Backup::class , 'server_id');
    }
}
