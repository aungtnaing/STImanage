<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Campusitem extends Model {

	//
	protected $table = 'campusitem';
	
	public function user()
    {
        return $this->belongsTo('App\User','userid');
    }

    public function campus()
    {
        return $this->belongsTo('App\Campus','campusid');
    }


}