@extends('layouts.default')
@section('content')

<div id="content">
	<div class="row">
		<div class="col-lg-12">
		<h1 class="page-header">CAMPUS</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
<a class="btn btn-primary btn-mini pull-left" href="{{ route("campus.create") }}">Add New campus</a>	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					campus
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
									<th>id</th>
									<th>photo1</th>					
									<th>photo2</th>
									<th>campus</th>
									<th>room type</th>
									<th>facilities</th>
									<th>condition</th>
									<th>available</th>
									<th>active</th>

									<th></th>
									<th></th>
								
							</tr>
						</thead>
						<tbody>

						@foreach($campus as $campu)
								<tr lass="odd gradeX">   
									<td>{{ $campu->id }}</td>
									<td><img src="{{ $campu->photourl1 }}" width="200" height="100"></td>
									
										<td><img src="{{ $campu->photourl2 }}" width="200" height="100"></td>
									
									<td>{{ $campu->roomno }} / {{ $campu->floor }} / {{ $campu->building }} <br> {{ $campu->campus }}</td>
									<td>{{ $campu->roomarea }} / {{ $campu->roomtype }} / {{ $campu->seats }}</td>
									<td>{{ $campu->facilities }}</td>
									<td>{{ $campu->condition }}</td>
									@if($campu->available==1)
									<td><i class="fa fa-check"></i></td>
									@else
									<td></td>
									@endif
									@if($campu->active==1)
									<td><i class="fa fa-check"></i></td>
									@else
									<td></td>
									@endif
									<td>
										<a class="btn btn-mini btn-primary" href="{{ route("campus.edit", $campu->id ) }}">Edit</a>
									</td>
									@if(Auth::user()->roleid==1 || Auth::user()->roleid==2)
									<td>
										<form method="POST" action="{{ route("campus.destroy", $campu->id) }}" accept-charset="UTF-8">
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

