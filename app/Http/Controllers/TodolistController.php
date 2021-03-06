<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Todolists;
use DB;
use App\Assigntasks;
use App\Tasks;
use File;
use Input;
use App\User;

class TodolistController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$todolists = Todolists::where('userid', $request->user()->id)
		->where('active',1)
		->get();


		$tasks = Tasks::where('active', 1)->get();
		$ourtasks = Assigntasks::where('userid', $request->user()->id)->get();



		$user = User::find($request->user()->id);


		return view("todolist.todolistspannel")
		->with("todolists", $todolists)
		->with("tasks", $tasks)
		->with("ourtasks", $ourtasks);
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function todolistmanager(Request $request)
	{
		//
		$todolists = Todolists::where('active',1)
		->get();
$tasks = Tasks::where('active', 1)->get();
		$ourtasks = Assigntasks::where('userid', $request->user()->id)->get();

		return view("todolist.todolistmanagerpannel")
		->with("todolists", $todolists)
		->with("tasks", $tasks)
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




		
		return view("todolist.todolistcreate")->with("tasks", $tasks)
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
			'title' => 'required',
			
			
			]);


		$todolist = new Todolists();

		$todolist->title = $request->input("title");

		
		$todolist->description = $request->input("description");

		$todolist->userid = $request->user()->id;
		$todolist->tdate = $request->input("tdate");
		$todolist->status = $request->input("status");	
		$todolist->done = 0;
		if (Input::get('done') === '1'){$todolist->done = 1;}

		$todolist->active = 0;
		if (Input::get('active') === '1'){$todolist->active = 1;}



		
		$todolist->save();
		return redirect()->route("todolists.index");
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
		$tasks = Tasks::where('active', 1)->get();
		$ourtasks = Assigntasks::where('userid', $request->user()->id)->get();




		
		$todolist = Todolists::find($id);
		return view('todolist.todolistedit')->with('todolist',$todolist)
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
			'title' => 'required',
			
			
			]);

		$todolist = Todolists::find($id);

		$todolist->tdate = $request->input("tdate");
		$todolist->status = $request->input("status");	

		$todolist->title = $request->input("title");

		
		$todolist->description = $request->input("description");


		$todolist->done = 0;
		if (Input::get('done') === ""){$todolist->done = 1;}

		$todolist->active = 0;
		if (Input::get('active') === ""){$todolist->active = 1;}


		$todolist->save();
		return redirect()->route("todolists.index");
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
		
		
		Todolists::destroy($id);

		return redirect()->route("todolists.index");
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
