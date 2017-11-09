<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $table = 'pinjaman';

    public function member()
    {
        return $this->belongsTo('App\Member', 'id_anggota');
    }

    public function installment()
    {
        return $this->hasMany('App\Installment', 'id_pinjaman');
    }
}
