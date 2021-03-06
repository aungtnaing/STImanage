<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Campusitem;
use DB;
use App\Tasks;
use App\Assigntasks;
use File;
use Input;

class CampusitemController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$campusitems = Campusitem::All();
    	$tasks = Tasks::where('active', 1)->get();
		$ourtasks = Assigntasks::where('userid', $request->user()->id)->get();
	
		return view("campusitem.campusitempannel")
		->with("campusitems", $campusitems)
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
		
		
		
		return view("campusitem.campusitemcreate")->with("tasks", $tasks)
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
			'actiondate' => 'required',
			'actions' => 'required',
			
			]);


		$campusitem = new Campusitem();
		$imagePath = public_path() . '/images/campusitem/';
		$lastid = DB::table('campusitem')->select('id')->orderBy('id', 'DESC')->first();
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
				$photourl1 = "/images/campusitem/" . $directory . '/photos/' .  $name;
			
			}

		}

	

		$campusitem->userid = $request->user()->id;

		$campusitem->actiondate = $request->input("actiondate");
		$campusitem->actions = $request->input("actions");

		$campusitem->campusid = $request->input("campusid");


		$campusitem->active = 0;
		if (Input::get('active') === '1'){$campusitem->active = 1;}

	
	
		$campusitem->photourl1 = $photourl1;
	
		
		$campusitem->save();
		return redirect()->route("campus.edit", $campusitem->campusid);
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
		
		$campusitem = Campusitem::find($id);
		$tasks = Tasks::where('active', 1)->get();
		$ourtasks = Assigntasks::where('userid', $request->user()->id)->get();
	
		return view('campusitem.campusitemedit')->with('campusitem',$campusitem)
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
			'actiondate' => 'required',
			'actions' => 'required',
			
			]);

		
		$campusitem = Campusitem::find($id);
			
		$imagePath = public_path() . '/images/campusitem/';
	
		$directory = $id;


		$input = $request->all();
		$destinationPath = $imagePath . $directory . '/photos';
	
		$photourl1 = $campusitem->photourl1;
		
	
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
				$photourl1 = "/images/campusitem/" . $directory . '/photos/' .  $name;
			 }

		}

			
		$campusitem->userid = $request->user()->id;

		$campusitem->actiondate = $request->input("actiondate");

		$campusitem->actions = $request->input("actions");
		
		$campusitem->photourl1 = $photourl1;
	
		$campusitem->active = 0;
		if (Input::get('active') === ""){$campusitem->active = 1;}


		$campusitem->save();
		return redirect()->route("campus.edit", $campusitem->campusid);
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
			$campusitem = Campusitem::find($id);

		$photourl1 = $campusitem->photourl1;
	
			if($photourl1!="")
				{
					if(file_exists(public_path() .$photourl1))
					{
						unlink(public_path() . $photourl1);
					}
				}

		
		
		Campusitem::destroy($id);

		return redirect()->route("Campusitem.index");
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
