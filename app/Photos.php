<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    protected $table = 'photos';

    public function galleries()
    {
        return $this->belongs('App\Galleries');
    }
}
