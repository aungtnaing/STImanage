<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Enquirys extends Model {

	//
	protected $table = 'enquiry';
	
 public function user()
    {
        return $this->belongsTo('App\User','userid');
    }

}
