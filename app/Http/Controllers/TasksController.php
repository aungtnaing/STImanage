<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tasks;
use App\Assigntasks;
use App\Taskissues;
use DB;
use App\User;
use File;
use Input;

class TasksController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		
		$tasks = Tasks::All();
		$ourtasks = Assigntasks::where('userid', $request->user()->id)->get();
		
		$users = User::All();
		$assignlists = Assigntasks::All();
		// $tasks = Tasks::where('active', 1)->get();
		// $ourtasks = Assigntasks::where('userid', $request->user()->id)->get();


		return view("tasks.taskpannel")
		->with("tasks", $tasks)
		->with("users", $users)
		->with("assignlists", $assignlists)
		->with("ourtasks", $ourtasks);
	}

	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		//
		$tasks = Tasks::where('active', 1)->get();
		$ourtasks = Assigntasks::where('userid', $request->user()->id)->get();
		return view("tasks.taskcreate")
		->with("tasks", $tasks)
		->with("ourtasks", $ourtasks);

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		

		$this->validate($request,[
			'tasktitle' => 'required',
			
			]);


		$task = new Tasks();
		$imagePath = public_path() . '/images/tasks/';
		$lastid = DB::table('tasks')->select('id')->orderBy('id', 'DESC')->first();
		if($lastid!=null)
		{
			$lastid = $lastid->id + 1;
		}
		else
		{
			$lastid = 1;	
		}
		$directory = $lastid;
		$input = $request->all();
		$destinationPath = $imagePath . $directory . '/photos';
		
		
		$photourl1 = "";
		
		
		
		if(Input::file('photourl1')!="")
		{
			if(Input::file('photourl1')->isValid())
			{
				$name =  time()  . '-photo' . '.' . $input['photourl1']->getClientOriginalExtension();
				File::exists($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);
				Input::file('photourl1')->move($destinationPath, $name); // uploading file to given path
				$photourl1 = "/images/tasks/" . $directory . '/photos/' .  $name;

			}

		}



		$task->userid = $request->user()->id;

		$task->taskdate = $request->input("taskdate");
		$task->content = $request->input("content");
		$task->tasktitle = $request->input("tasktitle");
		$task->deadline = $request->input("deadline");

		$task->budget = $request->input("budget");

		$task->active = 0;
		if (Input::get('active') === '1'){$task->active = 1;}



		$task->photourl1 = $photourl1;

		
		$task->save();
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
	public function edit($id,Request $request)
	{
		//
		
		$tasks = Tasks::where('active', 1)->get();
		$ourtasks = Assigntasks::where('userid', $request->user()->id)->get();

		$task = Tasks::find($id);

	
		return view("tasks.taskedit")->with("task", $task)
			->with("tasks", $tasks)
		->with("ourtasks", $ourtasks);

										
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{
		
		$this->validate($request,[
			'tasktitle' => 'required',

			
			]);

		
		$task = Tasks::find($id);

		$imagePath = public_path() . '/images/tasks/';

		$directory = $id;


		$input = $request->all();
		$destinationPath = $imagePath . $directory . '/photos';

		$photourl1 = $task->photourl1;
		

		if(Input::file('photourl1')!="")
		{
			

			if(Input::file('photourl1')->isValid())
			{
				if($photourl1!="")
				{
					if(file_exists(public_path() .$photourl1))
					{
						unlink(public_path() . $photourl1);
					}
				}



				$name =  time() . '-photo' . '.' . $input['photourl1']->getClientOriginalExtension();
				File::exists($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);
				Input::file('photourl1')->move($destinationPath, $name); // uploading file to given path
				$photourl1 = "/images/tasks/" . $directory . '/photos/' .  $name;
			}

		}


		$task->userid = $request->user()->id;

		$task->taskdate = $request->input("taskdate");
		$task->content = $request->input("content");
		$task->tasktitle = $request->input("tasktitle");
		$task->deadline = $request->input("deadline");

		$task->budget = $request->input("budget");


		$task->active = 0;
		if (Input::get('active') === ""){$task->active = 1;}


		$task->save();
		return redirect()->route("tasks.index");
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
		$task = Tasks::find($id);

		$photourl1 = $task->photourl1;

		if($photourl1!="")
		{
			if(file_exists(public_path() .$photourl1))
			{
				unlink(public_path() . $photourl1);
			}
		}

		
		
		Tasks::destroy($id);
		Assigntasks::where('taskid', $id)->delete();
		Taskissues::where('taskid', $id)->delete();

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
