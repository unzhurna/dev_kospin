<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    protected $table = 'anggota';

    public function savings()
    {
        return $this->hasMany('App\Saving');
    }

    public function loans()
    {
        return $this->hasMany('App\Loan');
    }
}
