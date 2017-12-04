@extends('layouts.default')
@section('content')

<div id="content">
	<div class="row">
		<div class="col-lg-12">
		<h1 class="page-header">Assign Tasks</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					staff
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>

								<th>id</th>
								<th>Name</th>
								<th>Role</th>
								<th>Ph1</th>
								<th>Tasks</th>
								<th></th>
								
							</tr>
						</thead>
						<tbody>

							@foreach($users as $user)
							<tr class="odd gradeX">   
								<td>{{ $user->id }}</td>
								<td>{{ $user->name }}</td>
								@if($user->roleid==1)
								<td>Admin</td>
								@elseif($user->roleid==2)
								<td>Manager</td>
								@elseif($user->roleid==3)
								<td>Admission Manager</td>
								@elseif($user->roleid==4)
								<td>Campus Manager</td>
								@elseif($user->roleid==5)
								<td>Teacher</td>
								@elseif($user->roleid==10)
								<td>Staff</td>
								@else
								<td>User</td>
								@endif
								<td>{{ $user->ph1 }}</td>
								<td>
									@foreach($assignlists as $assigntask)
										@if($assigntask->userid == $user->id)
											{{ $assigntask->task->tasktitle }}<br>
										@endif
									@endforeach

								</td>
								<td><a class="btn btn-mini btn-info" href="{{ route("assigntasks.edit", $user->id ) }}">Assign Task</a></td>
							

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