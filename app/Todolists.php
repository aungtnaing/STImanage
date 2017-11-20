<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Todolists extends Model {

	//
	protected $table = 'todolists';

	    public function user()
    {
        return $this->belongsTo('App\User','userid');
    }
	

}