<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mainslides;
use DB;
use App\Tasks;
use App\Assigntasks;

use File;
use Input;

class MainslideController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$mainslides = Mainslides::All();
    	$tasks = Tasks::where('active', 1)->get();
		$ourtasks = Assigntasks::where('userid', $request->user()->id)->get();
		
		return view("mainslide.mainslidespannel")
		->with("mainslides", $mainslides)
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
		return view("mainslide.mainslidecreate")
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
			'photourl1' => 'required',
			
			
			]);


		$mainslide = new Mainslides();
		$imagePath = public_path() . '/images/mainslide/';
		$lastid = DB::table('mainslides')->select('id')->orderBy('id', 'DESC')->first();
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
		$photourl2 = "";
		
		
		if(Input::file('photourl1')!="")
		{
			if(Input::file('photourl1')->isValid())
			{
				$name =  time()  . '-mainslide' . '.' . $input['photourl1']->getClientOriginalExtension();
				File::exists($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);
				Input::file('photourl1')->move($destinationPath, $name); // uploading file to given path
				$photourl1 = "/images/mainslide/" . $directory . '/photos/' .  $name;
			
			}

		}

		if(Input::file('photourl2')!="")
		{
			if(Input::file('photourl2')->isValid())
			{
				$name =  time()  . '-thum' . '.' . $input['photourl2']->getClientOriginalExtension();
				File::exists($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);
				Input::file('photourl2')->move($destinationPath, $name); // uploading file to given path
				$photourl2 = "/images/mainslide/" . $directory . '/photos/' .  $name;
			
			}

		}

		$mainslide->title = $request->input("title");

		$mainslide->stitle = $request->input("stitle");
		$mainslide->description = $request->input("description");

				$mainslide->slideno = $request->input("slideno");


		$mainslide->active = 0;
		if (Input::get('active') === '1'){$mainslide->active = 1;}

	
	
		$mainslide->photourl1 = $photourl1;
		$mainslide->photourl2 = $photourl2;
		
		$mainslide->save();
		return redirect()->route("mainslides.index");
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
		
	
		$mainslide = Mainslides::find($id);
		return view('mainslide.mainslideedit')->with('mainslide',$mainslide)
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
		
		
		$mainslide = Mainslides::find($id);
			
		$imagePath = public_path() . '/images/mainslide/';
	
		$directory = $id;


		$input = $request->all();
		$destinationPath = $imagePath . $directory . '/photos';
	
		$photourl1 = $mainslide->photourl1;
		$photourl2 = $mainslide->photourl2;
		// ini_set('post_max_size', '64M');
		// ini_set('upload_max_filesize', '64M');
	
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
					


				$name =  time() . '-mainslide' . '.' . $input['photourl1']->getClientOriginalExtension();
				File::exists($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);
				Input::file('photourl1')->move($destinationPath, $name); // uploading file to given path
				$photourl1 = "/images/mainslide/" . $directory . '/photos/' .  $name;
			 }

		}

				if(Input::file('photourl2')!="")
		{
			

			 if(Input::file('photourl2')->isValid())
			 {
				if($photourl2!="")
				{
					if(file_exists(public_path() .$photourl2))
					{
						unlink(public_path() . $photourl2);
					}
				}
					


				$name =  time() . '-thum' . '.' . $input['photourl2']->getClientOriginalExtension();
				File::exists($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);
				Input::file('photourl2')->move($destinationPath, $name); // uploading file to given path
				$photourl2 = "/images/mainslide/" . $directory . '/photos/' .  $name;
			 }

		}
	
		$mainslide->title = $request->input("title");

		$mainslide->stitle = $request->input("stitle");
		$mainslide->description = $request->input("description");

				$mainslide->slideno = $request->input("slideno");
		
		$mainslide->photourl1 = $photourl1;
		$mainslide->photourl2 = $photourl2;

		$mainslide->active = 0;
		if (Input::get('active') === ""){$mainslide->active = 1;}


		$mainslide->save();
		return redirect()->route("mainslides.index");
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
			$mainslide = Mainslide::find($id);

		$photourl1 = $mainslide->photourl1;
	
			if($photourl1!="")
				{
					if(file_exists(public_path() .$photourl1))
					{
						unlink(public_path() . $photourl1);
					}
				}

		$photourl2 = $mainslide->photourl2;
	
			if($photourl2!="")
				{
					if(file_exists(public_path() .$photourl2))
					{
						unlink(public_path() . $photourl2);
					}
				}		
		
		Mainslides::destroy($id);

		return redirect()->route("mainslides.index");
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
