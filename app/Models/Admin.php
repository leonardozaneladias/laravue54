<?php

namespace Laravue54\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }
}
