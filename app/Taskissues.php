<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Taskissues extends Model {

	//
	protected $table = 'taskissues';
	
	public function user()
    {
        return $this->belongsTo('App\User','userid');
    }
    public function task()
    {
        return $this->belongsTo('App\Tasks','taskid');
    }

  


}