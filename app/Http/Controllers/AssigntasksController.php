<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Assigntasks;
use App\Tasks;
use App\User;
use DB;
use Mail;

use File;
use Input;

class AssigntasksController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		// $users = User::All();
		// $assignlists = Assigntasks::All();
		// $tasks = Tasks::where('active', 1)->get();
		// $ourtasks = Assigntasks::where('userid', $request->user()->id)->get();
		

		
		
		// return view("tasks.assigntaskpannel")
		// ->with("users", $users)
		// ->with("assignlists", $assignlists)
		// ->with("tasks", $tasks)
		// ->with("ourtasks", $ourtasks);
	}

	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		// return view("tasks.taskcreate");

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		

		$tasks = Tasks::where('active',1)->get();
	
		$user = User::find(Input::get('userid'));

		foreach($tasks as $task)
		{


			if (Input::get($task->id) === '1') //checked
			{
							

				$assigntask = Assigntasks::where('userid', Input::get('userid'))
				                           ->where('taskid', $task->id)
				                           ->get();
				 if(count($assigntask) > 0)
				 {

				 
				 }
				 else
				 {

				 	$assigntask = new Assigntasks();
					$assigntask->taskid = $task->id;
					$assigntask->userid = Input::get('userid');
					$assigntask->save();



					$data = array(
			        'name' => $user->name,
			        'email' => $user->email,
			        'title' => $task->tasktitle,
			        'taskdate' => $task->taskdate,
			       	'deadline' => $task->deadline,
			       	'budget' => $task->budget,
			        'messagecontent' => $task->content,
			   		 );

					
					// var_dump($data);
					// die();
			    	Mail::send('emails.layoutmail', $data, function ($message) use ($data){



			        $message->from('stieducontact@gmail.com', 'STI Manager');

			        $message->to($data['email'])->subject('STI Manager | New Task Assign')
			        										->replyTo('stieducontact@gmail.com');

			    });


				 }

				

			}
			else
			{

							


				$assigntask = Assigntasks::where('userid', Input::get('userid'))
				                           ->where('taskid', $task->id)
				                           ->get();
				 if(count($assigntask)>0)
				 {

				 	Assigntasks::destroy($assigntask[0]->id);
				 }

			}

		}

		

		
		return redirect()->route("tasks.index");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id, Request $request)
	{
		//
		$user = User::find($id);
		$tasks = Tasks::where('active',1)->get();
		$assigntasks = Assigntasks::where('userid', $id)->get();

		return view("tasks.assigntaskcreate")->with('user', $user)
		->with('tasks', $tasks)
		->with('assigntasks', $assigntasks);
		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//

		
		
		Assigntasks::destroy($id);

		return redirect()->route("tasks.index");
	}

	public function rrmdir($dir) {
		if (is_dir($dir)) {
			$objects = scandir($dir);
			foreach ($objects as $object) {
				if ($object != "." && $object != "..") {
					if (filetype($dir."/".$object) == "dir") 
						rrmdir($dir."/".$object); 
					else unlink   ($dir."/".$object);
				}
			}
			reset($objects);
			rmdir($dir);
		}
	}

}
