<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galleries extends Model
{
    protected $table = 'galleries';

    /**
     * Get the Photos.
     */
    public function photos()
    {
        return $this->hasMany('App\Photos', 'gallery_id', 'id');
    }
}
