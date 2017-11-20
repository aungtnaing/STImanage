<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\User;
use App\Category;
use DB;
use Hash;
use Auth;
use Config;
use View;
use File;
use Input;


class ProfilesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		// echo "HELLLLLLLLL";
		// die();
		// return view('dashboard.userprofile');
	
	}

	public function dashboarduserindex(Request $request)
	{

		// return view('dashboard.userprofile');
		// echo "hello dsh";
		// die();

		$user = User::find($request->user()->id);

		return view('users.userprofileupdate')->with('user',$user);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	
/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
public function store(Request $request)
{
	
	// echo "new user";
	// die();
	$this->validate($request,[
		'name' => 'required|max:255',
				// 'address' => 'required',
		'email' => 'required|unique:users|max:255',
		// 'ph1' => 'required',
		'password' => 'required',
		]);
	
	$user = new User();
	

	
	$user->name = $request->input("name");
		// $user->mname = $request->input("mname");
	
	// $user->address = $request->input("address");
	$user->ph1 = $request->input("ph1");
		// $user->ph2 = $request->input("ph2");
	$user->email = $request->input("email");
	$user->password = Hash::make($request->input("password"));
		// $user->photourl = $photourl;
	$user->save();

	
	$credentials = array(
		'email' => $request->input("email"),
		'password' => $request->input("password")
		);

	if (Auth::attempt($credentials)) {
		return redirect()->action('HomeController@index');
	}
	

	

}

	/**
	 * Display th$userid = $request->user()->id;specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
		if(Auth::user()->roleid==1)
		{
			$user = User::find($id);

			return view('users.userrole')->with('user',$user);
		}
		else
		{
			return redirect()->action('HomeController@index');
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// //
		// echo "edit";
		// die();
			$categorys = Category::All();

		if($id==Auth::user()->id)
		{
			$user = User::find($id);

			return view('auth.profile')->with('user',$user)->with('categorys', $categorys);
		}
		else
		{
			return redirect()->action('HomeController@index');
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		
		$userid = $request->user()->id;
		$user = User::find($userid);

		if($user->email!=$request->user()->email)
		{
			$this->validate($request,[
				'name' => 'required|max:255',
				// 'address' => 'required',
				'email' => 'required|unique:users|max:255',
				// 'ph1' => 'required',
			
				]);
		}
		else
		{
			$this->validate($request,[
				'name' => 'required|max:255',
				// 'address' => 'required',
				'email' => 'required|max:255',
				// 'ph1' => 'required',
				
				]);

		}
		
		
		$input = $request->all();
		$photourl = $request->user()->photourl;


		if(Input::file('photourl')!="")
		{
			if(Input::file('photourl')->isValid())
			{


				$name =  time() . '-' . $request->user()->id . '.' . $input['photourl']->getClientOriginalExtension();
				$imagePath = public_path() . '/images/users/';
				$directory = $userid;

				if($photourl!=""){
					if (file_exists(public_path() .$photourl)) {

						
						unlink(public_path() . $photourl);
					}
				}
				
				$destinationPath = $imagePath . $directory . '/profilePictures';

				File::exists($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);


			Input::file('photourl')->move($destinationPath, $name); // uploading file to given path

			$photourl = "/images/users/" . $directory . '/profilePictures/' .  $name;
		}
	}
	$user->name = $request->input("name");
	
	$user->address = $request->input("address");
	$user->ph1 = $request->input("ph1");
		$user->ph2 = $request->input("ph2");

	$user->email = $request->input("email");
	if($request->input("password")!="")
	{
		$user->password = Hash::make($request->input("password"));
	}
	$user->photourl = $photourl;


	$user->bio =  $request->input("bio");
	$user->department =  $request->input("department");

	$user->ranks =  $request->input("ranks");
	$user->workat =  $request->input("workat");



	$user->save();

	return redirect()->action('HomeController@index');
	
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

		$user = User::find($id);




				if($user->photourl!=""){
					if (file_exists(public_path() .$user->photourl)) {

						
						unlink(public_path() . $user->photourl);
					}
				}


				User::destroy($id);


				return redirect()->route("userspannel.index");
				

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


