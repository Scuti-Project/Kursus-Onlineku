<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
	protected $table = 'fasilitas';

	protected $primaryKey = 'id_fasilitas';

    protected $fillable = [
    	'user_id', 'id_materi',
    ];
}
