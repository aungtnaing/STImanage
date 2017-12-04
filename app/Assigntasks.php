<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Assigntasks extends Model {

	//
	protected $table = 'assigntasks';
	
	public function user()
    {
        return $this->belongsTo('App\User','userid');
    }
    public function task()
    {
        return $this->belongsTo('App\Tasks','taskid');
    }

  


}