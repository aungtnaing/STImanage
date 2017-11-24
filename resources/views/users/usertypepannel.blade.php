@extends('layouts.default')
@section('content')

<div id="content">
	<div class="row">
		<div class="col-lg-12">
		<h1 class="page-header">User Manager</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					users
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>

								<th>id</th>

								<th>Name</th>
								<th>Email</th>
								<th>Role</th>
								<th>Ph1</th>
								<th>Address</th>
								<th>Department</th>
								<th></th>
								<th></th>
								
							</tr>
						</thead>
						<tbody>

							@foreach($users as $user)
							<tr class="odd gradeX">   
								<td>{{ $user->id }}</td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								@if($user->roleid==1)
								<td>Admin</td>
								@elseif($user->roleid==2)
								<td>Manager</td>
								@elseif($user->roleid==3)
								<td>Admission Manager</td>
								@elseif($user->roleid==4)
								<td>Campus Manager</td>
								@elseif($user->roleid==10)
								<td>Staff</td>

								@else
								<td>User</td>
								@endif
								<td>{{ $user->ph1 }}</td>
								<!-- <td>{{ $user->ph2 }}</td> -->
								<td>{{ $user->address }}</td>
								<td>{{ $user->department }}/{{ $user->ranks }}</td>
								<td><a class="btn btn-mini btn-info" href="{{ route("profiles.show", $user->id ) }}">Role</a></td>
								@if(Auth::user()->roleid==1)

								<td class="center">
									<form method="POST" action="{{ route("profiles.destroy", $user->id) }}" accept-charset="UTF-8">
										<input name="_method" type="hidden" value="DELETE">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input class="btn btn-mini btn-danger" type="submit" value="Delete">
									</form>
								</td>
								@else
								<td></td>
								@endif

							</tr>
							@endforeach





						</tbody>
					</table>
					<!-- /.table-responsive -->

				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
</div>



  


@stop