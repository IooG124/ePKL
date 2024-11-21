<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    public function author()
    {
        return $this->morphTo();
    }
}  
