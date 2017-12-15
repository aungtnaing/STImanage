<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Assigntasks;
use App\Tasks;
use App\Taskissues;
use App\User;
use DB;

use File;
use Input;

class FeedbacksController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		
		// $tasks = Tasks::where('active', 1)->get();
		// $ourtasks = Assigntasks::where('userid', $request->user()->id)->get();
		
		
		// return view("feedbacks.feedbackpannel")
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
		





		$this->validate($request,[
			'feedbackdate' => 'required',
			'feedback' => 'required',

			]);


		$feebackitem = new Taskissues();
		$feebackitem->feedbackdate = $request->input("feedbackdate");
		$feebackitem->feedback = $request->input("feedback");
		$feebackitem->costs = $request->input("costs");
		$feebackitem->taskid = $request->input("taskid");
		$feebackitem->userid = $request->user()->id;
		$feebackitem->active = 0;
		if (Input::get('active') === '1'){$feebackitem->active = 1;}



		
		$feebackitem->save();
		return redirect()->route("feedbackissue", $request->input("taskid"));
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
	
		$tasks = Tasks::where('active',1)->get();
		$ourtasks = Assigntasks::where('userid', $request->user()->id)->get();

		
		$feedback = Taskissues::find($id);
		return view("feedbacks.feedbackedit")->with('feedback', $feedback)
		->with('tasks', $tasks)
		->with('ourtasks', $ourtasks);
		
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
			'feedbackdate' => 'required',
			'feedback' => 'required',

			]);
		// echo "string";
		// die();

		$feebackitem = Taskissues::find($id);

		$feebackitem->feedbackdate = $request->input("feedbackdate");
		$feebackitem->feedback = $request->input("feedback");
		$feebackitem->costs = $request->input("costs");
		
		$feebackitem->active = 0;
		if (Input::get('active') === ""){$feebackitem->active = 1;}

		



		
		$feebackitem->save();
		return redirect()->route("feedbackissue", $feebackitem->taskid);
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

		return redirect()->route("assigntasks.index");
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
