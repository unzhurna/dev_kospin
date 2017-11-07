<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $table = 'setoran';

    public function __saving()
    {
        return $this->belongsTo('App\Saving', 'id_simpanan');
    }

}
