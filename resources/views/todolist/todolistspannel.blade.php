@extends('layouts.default')
@section('content')

<div id="content">
	<div class="row">
		<div class="col-lg-12">
		<h1 class="page-header">Your TO DO LISTs</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
<a class="btn btn-primary btn-mini pull-left" href="{{ route("todolists.create") }}">Add New</a>	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					TO DO LIST
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
									<th>id</th>
									<th>Task</th>					
									<th>Description</th>
									<th>Date</th>
									<th>Status</th>
									<th>Done</th>
									<th>active</th>

									<th></th>
									<th></th>
								
							</tr>
						</thead>
						<tbody>

						@foreach($todolists as $todolist)
								<tr lass="odd gradeX">   
									<td>{{ $todolist->id }}</td>
									
									
									<td>{{ $todolist->title }}</td>
									
									<td>{{ $todolist->description }}</td>
									<td>{{ $todolist->tdate }}</td>
									<td>{{ $todolist->status }}</td>
									@if($todolist->done==1)
									<td><i class="fa fa-check"></i></td>
									@else
									<td></td>
									@endif
									@if($todolist->active===1)
									<td><i class="fa fa-check"></i></td>
									@else
									<td></td>
									@endif
									<td>
										<a class="btn btn-mini btn-primary" href="{{ route("todolists.edit", $todolist->id ) }}">Edit</a>
									</td>
									
									<td>
										<form method="POST" action="{{ route("todolists.destroy", $todolist->id) }}" accept-charset="UTF-8">
											<input name="_method" type="hidden" value="DELETE">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input class="btn btn-mini btn-danger" type="submit" value="Delete">
										</form>
									</td>
								
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

