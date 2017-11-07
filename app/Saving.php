<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saving extends Model
{
    protected $table = 'simpanan';

    public function member()
    {
        return $this->belongsTo('App\Member', 'id_anggota');
    }

    public function deposit()
    {
        return $this->hasMany('App\Deposit', 'id_simpanan');
    }
}
