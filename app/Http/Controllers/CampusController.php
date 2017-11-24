<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Campus;
use DB;

use File;
use Input;

class CampusController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$campus = Campus::All();
    	
		return view("campus.campuspannel")
		->with("campus", $campus);
	}

	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view("campus.campuscreate");

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		

		$this->validate($request,[
			'roomno' => 'required',
			'building' => 'required',
			'campus' => 'required',

			]);


		$campu = new Campus();
		$imagePath = public_path() . '/images/campus/';
		$lastid = DB::table('campus')->select('id')->orderBy('id', 'DESC')->first();
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
				$name =  time()  . '-photo1' . '.' . $input['photourl1']->getClientOriginalExtension();
				File::exists($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);
				Input::file('photourl1')->move($destinationPath, $name); // uploading file to given path
				$photourl1 = "/images/campus/" . $directory . '/photos/' .  $name;
			
			}

		}

		if(Input::file('photourl2')!="")
		{
			if(Input::file('photourl2')->isValid())
			{
				$name =  time()  . '-photo2' . '.' . $input['photourl2']->getClientOriginalExtension();
				File::exists($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);
				Input::file('photourl2')->move($destinationPath, $name); // uploading file to given path
				$photourl2 = "/images/campus/" . $directory . '/photos/' .  $name;
			
			}

		}

		$campu->roomno = $request->input("roomno");

		$campu->floor = $request->input("floor");

		$campu->building = $request->input("building");

		$campu->campus = $request->input("campus");

		$campu->roomarea = $request->input("roomarea");


		$campu->photourl1 = $photourl1;
		$campu->photourl2 = $photourl2;

		$campu->roomtype = $request->input("roomtype");

		$campu->seats = $request->input("seats");

		$campu->facilities = $request->input("facilities");

		$campu->condition = $request->input("condition");

		$campu->available = 0;
		if (Input::get('available') === '1'){$campu->available = 1;}

		$campu->active = 0;
		if (Input::get('active') === '1'){$campu->active = 1;}

	
	
		
		$campu->save();
		return redirect()->route("campus.index");
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
	public function edit($id)
	{
		//
		
		$campu = Campus::find($id);
		return view('campus.campusedit')->with('campu',$campu);
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
			'roomno' => 'required',
			'building' => 'required',
			'campus' => 'required',

			]);

		$campu = Campus::find($id);
			
		$imagePath = public_path() . '/images/campus/';
	
		$directory = $id;


		$input = $request->all();
		$destinationPath = $imagePath . $directory . '/photos';
	
		$photourl1 = $campu->photourl1;
		$photourl2 = $campu->photourl2;
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
					


				$name =  time() . '-photo1' . '.' . $input['photourl1']->getClientOriginalExtension();
				File::exists($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);
				Input::file('photourl1')->move($destinationPath, $name); // uploading file to given path
				$photourl1 = "/images/campus/" . $directory . '/photos/' .  $name;
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
					


				$name =  time() . 'photo2' . '.' . $input['photourl2']->getClientOriginalExtension();
				File::exists($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);
				Input::file('photourl2')->move($destinationPath, $name); // uploading file to given path
				$photourl2 = "/images/campus/" . $directory . '/photos/' .  $name;
			 }

		}
	
		$campu->roomno = $request->input("roomno");

		$campu->floor = $request->input("floor");

		$campu->building = $request->input("building");

		$campu->campus = $request->input("campus");

		$campu->roomarea = $request->input("roomarea");


		$campu->photourl1 = $photourl1;
		$campu->photourl2 = $photourl2;

		$campu->roomtype = $request->input("roomtype");

		$campu->seats = $request->input("seats");

		$campu->facilities = $request->input("facilities");

		$campu->condition = $request->input("condition");

		$campu->active = 0;
		if (Input::get('active') === ""){$campu->active = 1;}

		$campu->available = 0;
		if (Input::get('available') === ""){$campu->available = 1;}

		$campu->save();
		return redirect()->route("campus.index");
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
			$campu = Campus::find($id);

		$photourl1 = $campu->photourl1;
	
			if($photourl1!="")
				{
					if(file_exists(public_path() .$photourl1))
					{
						unlink(public_path() . $photourl1);
					}
				}

		$photourl2 = $campu->photourl2;
	
			if($photourl2!="")
				{
					if(file_exists(public_path() .$photourl2))
					{
						unlink(public_path() . $photourl2);
					}
				}		
		
		Campus::destroy($id);

		return redirect()->route("campus.index");
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
