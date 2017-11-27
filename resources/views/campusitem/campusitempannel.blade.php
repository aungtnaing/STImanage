@extends('layouts.default')
@section('content')

<div id="content">
	<div class="row">
		<div class="col-lg-12">
		<h1 class="page-header">Campus Action Manager</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Campus Action
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
									<th>id</th>
									<th>Campus</th>
									<th>Campus</th>
									<th>Action</th>					
									<th>Action Date</th>
									<th>Actions</th>
									<th>Staff</th>
									<th>active</th>

									<!-- <th></th> -->
									<th></th>
								
							</tr>
						</thead>
						<tbody>

						@foreach($campusitems as $campusitem)
								<tr lass="odd gradeX">   
									<td>{{ $campusitem->id }}</td>
									<td><img src="{{ $campusitem->campus->photourl1 }}" width="100" height="100"></td>
									<td>{{ $campusitem->campus->roomno }} / {{ $campusitem->campus->floor }} / {{ $campusitem->campus->building }} <br> {{ $campusitem->campus->campus }}</td>
									<td><img src="{{ $campusitem->photourl1 }}" width="100" height="100"></td>
									
									<td>{{ $campusitem->actiondate }}</td>
									<td>{{ $campusitem->actions }}</td>
									<td>{{ $campusitem->user->name }} <br>
									{{ $campusitem->user->department }}/{{ $campusitem->user->ranks }}</td>
									@if($campusitem->active==1)
									<td><i class="fa fa-check"></i></td>
									@else
									<td></td>
									@endif
									<!-- <td>
										<a class="btn btn-mini btn-primary" href="{{ route("campusitem.edit", $campusitem->id ) }}">Edit</a>
									</td> -->
									@if(Auth::user()->roleid==1 || Auth::user()->roleid==2)
									<td>
										<form method="POST" action="{{ route("campusitem.destroy", $campusitem->id) }}" accept-charset="UTF-8">
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

