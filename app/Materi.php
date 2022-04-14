<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $table = 'materi';

    protected $primaryKey = 'id_materi';

    protected $fillable = [
    	'judul_materi', 'filename'
    ];

    public function users()
    {
    	return $this->belongsToMany('App\User', 'fasilitas', 'id_materi', 'user_id');
    }
}
