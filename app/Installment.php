<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    protected $table = 'angsuran';

    public function loan()
    {
        return $this->hasMany('App\Loan', 'id_pinjaman');
    }
}
