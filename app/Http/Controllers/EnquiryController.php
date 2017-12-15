<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enquirys;
use DB;
use App\Assigntasks;
use App\Tasks;
use File;
use Input;

class EnquiryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$enquirys = Enquirys::All();
    	$tasks = Tasks::All();
		$ourtasks = Assigntasks::where('userid', $request->user()->id)->get();
		
		
		return view("enquirys.enquiryspannel")
		->with("enquirys", $enquirys)
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
			$tasks = Tasks::All();
		$ourtasks = Assigntasks::where('userid', $request->user()->id)->get();
		
		return view("enquirys.createenquiry")->with("tasks", $tasks)
		->with("ourtasks", $ourtasks);

	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	

	public function store(Request $request)
	{
		

		$this->validate($request,[
			'name' => 'required|max:255',
			
			]);


		$enquiry = new Enquirys();
				
						$enquiry->userid = $request->user()->id;

		$enquiry->name = $request->input("name");
		$enquiry->age = $request->input("age");	
		$enquiry->mumname = $request->input("mumname");
		$enquiry->fatname = $request->input("fatname");
		$enquiry->parentocc = $request->input("parentocc");
		$enquiry->address = $request->input("address");
		$enquiry->phone = $request->input("phone");
		$enquiry->email = $request->input("email");
		$enquiry->highestedu = $request->input("highestedu");
		$enquiry->nameofschool = $request->input("nameofschool");
		$enquiry->ourschool = $request->input("ourschool");
		$enquiry->totalmarks = $request->input("totalmarks");
		$enquiry->english = $request->input("english");
		$enquiry->mathematics = $request->input("mathematics");
		$enquiry->physics = $request->input("physics");
		$enquiry->chemistry = $request->input("chemistry");
		$enquiry->biology = $request->input("biology");
		$enquiry->myanmar = $request->input("myanmar");
		$enquiry->others = $request->input("others");
		$enquiry->igcseenglish = $request->input("igcseenglish");
		$enquiry->igcsepuremaths = $request->input("igcsepuremaths");
		$enquiry->igcsemaths = $request->input("igcsemaths");
		$enquiry->igcsephysics = $request->input("igcsephysics");
		$enquiry->igcsechemistry = $request->input("igcsechemistry");
		$enquiry->igcsebiology = $request->input("igcsebiology");
		$enquiry->igcseothers = $request->input("igcseothers");
  		$enquiry->programinterested = $request->input("programinterested");
  		$enquiry->interview = $request->input("interview");
  		$enquiry->campus = $request->input("compus");
  		$enquiry->remarks = $request->input("remarks");

		
		$enquiry->active = 0;
		if (Input::get('active') === '1'){$enquiry->active = 1;}

	
		
		
		$enquiry->save();

		
		return redirect()->route("enquirys.index");
		
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
		$tasks = Tasks::All();
		$ourtasks = Assigntasks::where('userid', $request->user()->id)->get();
		$enquiry = Enquirys::find($id);
		return view('enquirys.editenquiry')->with('enquiry',$enquiry)
		->with("tasks", $tasks)
		->with("ourtasks", $ourtasks);
	}

	/**
	 * Update the specified resource in storage.
	 *testimonial
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{
		$this->validate($request,[
		
			'name' => 'required|max:255',
		
			
			]);
		
		$enquiry = Enquirys::find($id);
			
								$enquiry->userid = $request->user()->id;

		$enquiry->name = $request->input("name");
		$enquiry->age = $request->input("age");	
		$enquiry->mumname = $request->input("mumname");
		$enquiry->fatname = $request->input("fatname");
		$enquiry->parentocc = $request->input("parentocc");
		$enquiry->address = $request->input("address");
		$enquiry->phone = $request->input("phone");
		$enquiry->email = $request->input("email");
		$enquiry->highestedu = $request->input("highestedu");
		$enquiry->nameofschool = $request->input("nameofschool");
		$enquiry->ourschool = $request->input("ourschool");
		$enquiry->totalmarks = $request->input("totalmarks");
		$enquiry->english = $request->input("english");
		$enquiry->mathematics = $request->input("mathematics");
		$enquiry->physics = $request->input("physics");
		$enquiry->chemistry = $request->input("chemistry");
		$enquiry->biology = $request->input("biology");
		$enquiry->myanmar = $request->input("myanmar");
		$enquiry->others = $request->input("others");
		$enquiry->igcseenglish = $request->input("igcseenglish");
		$enquiry->igcsepuremaths = $request->input("igcsepuremaths");
		$enquiry->igcsemaths = $request->input("igcsemaths");
		$enquiry->igcsephysics = $request->input("igcsephysics");
		$enquiry->igcsechemistry = $request->input("igcsechemistry");
		$enquiry->igcsebiology = $request->input("igcsebiology");
		$enquiry->igcseothers = $request->input("igcseothers");
  		$enquiry->programinterested = $request->input("programinterested");
  		$enquiry->campus = $request->input("campus");
  		$enquiry->remarks = $request->input("remarks");


		$enquiry->active = 0;
		if (Input::get('active') === ""){$enquiry->active = 1;}

		
		
		
		$enquiry->save();
		return redirect()->route("enquirys.index");
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
			

		
		Enquirys::destroy($id);

		return redirect()->route("enquirys.index");
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
