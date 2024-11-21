<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function jurnal()
    {
        return $this->morphMany(Jurnal::class, 'author');
    }
}
