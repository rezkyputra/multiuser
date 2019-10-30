<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $fillable = [
        'id_user', 'fullname', 'gender', 'no_telp' , 'expected_sallary', 'address',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
