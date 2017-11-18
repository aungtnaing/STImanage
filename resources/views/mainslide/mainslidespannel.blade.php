@extends('layouts.default')
@section('content')

<div id="content">
	<div class="row">
		<div class="col-lg-12">
		<h1 class="page-header">MAINSLIDE Manager</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
<a class="btn btn-primary btn-mini pull-left" href="{{ route("mainslides.create") }}">Add New Mainslide</a>	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					MAINSLIDE
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
									<th>id</th>
									<th>Main Slide</th>					
									<th>Thum</th>
									<th>Title</th>
									<th>Sub Title</th>
									<th>Description</th>
									<th>SlideNo</th>
									<th>active</th>

									<th></th>
									<th></th>
								
							</tr>
						</thead>
						<tbody>

						@foreach($mainslides as $mainslide)
								<tr lass="odd gradeX">   
									<td>{{ $mainslide->id }}</td>
									<td><img src="{{ $mainslide->photourl1 }}" width="200" height="100"></td>
									
										<td><img src="{{ $mainslide->photourl2 }}" width="200" height="100"></td>
									
									<td>{{ $mainslide->title }}</td>
									<td>{{ $mainslide->stitle }}</td>
									<td>{{ $mainslide->description }}</td>
									<td>{{ $mainslide->slideno }}</td>
									@if($mainslide->active==1)
									<td><i class=" icon-check"></i></td>
									@else
									<td></td>
									@endif
									<td>
										<a class="btn btn-mini btn-primary" href="{{ route("mainslides.edit", $mainslide->id ) }}">Edit</a>
									</td>
									@if(Auth::user()->roleid==1 || Auth::user()->roleid==2)
									<td>
										<form method="POST" action="{{ route("mainslides.destroy", $mainslide->id) }}" accept-charset="UTF-8">
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

