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



<div id="content">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Tasks List</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
<a class="btn btn-primary btn-mini pull-left" href="{{ route("tasks.create") }}">Add New task</a>	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Tasks
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>id</th>
								<th>Photo</th>
								<th>Title</th>
								<th>Description</th>					
								<th>Task Date</th>
								<th>Deadline</th>
								<th>Budget</th>
								<th>active</th>

								<th></th>
								<th></th>
								
							</tr>
						</thead>
						<tbody>

							@foreach($tasks as $task)
							<tr lass="odd gradeX">   
								<td>{{ $task->id }}</td>
								<td><img src="{{ $task->photourl1 }}" width="100" height="100"></td>
								<td>{{ $task->tasktitle }}</td>
								<td>{{ $task->content }}</td>
								<td>{{ $task->taskdate }}</td>
								<td>{{ $task->deadline }}</td>
								<td>{{ $task->budget }}</td>

								@if($task->active==1)
								<td><i class="fa fa-check"></i></td>
								@else
								<td></td>
								@endif
								<td>
									<a class="btn btn-mini btn-primary" href="{{ route("tasks.edit", $task->id ) }}">Edit</a>
								</td>
								@if(Auth::user()->roleid==1 || Auth::user()->roleid==2)
								<td>
									<form method="POST" action="{{ route("tasks.destroy", $task->id) }}" accept-charset="UTF-8">
										<input name="_method" type="hidden" value="DELETE">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input class="btn btn-mini btn-danger" type="submit" value="Delete">
									</form>
								</td>
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

