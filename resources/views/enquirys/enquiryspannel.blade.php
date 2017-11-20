@extends('layouts.default')
@section('content')

<div id="content">
	<div class="row">
		<div class="col-lg-12">
		<h1 class="page-header">Enquiry List</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row"><a class="btn btn-primary btn-mini pull-left" href="{{ route("enquirys.create") }}">Add New enquiry</a></div>
	<div class="row">
	
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					enquiry
				</div>
				<!-- /.panel-heading -->


				
				<div class="panel-body">
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>

								<th>id</th>

								<th>Name</th>
								<th>Age</th>
								<th>Mum's name</th>
								<th>Phone</th>
								<th>Interested</th>
								<th>Interviewer</th>
								<th>Campus</th>
								<th>Date</th>
								<th></th>
								<th></th>
								
							</tr>
						</thead>
						<tbody>

							@foreach($enquirys as $enquiry)
							<tr class="odd gradeX">   
								<td>{{ $enquiry->id }}</td>
								<td>{{ $enquiry->name }}</td>
								<td>{{ $enquiry->age }}</td>
								<td>{{ $enquiry->mumname }}</td>
																						
								<td>{{ $enquiry->phone }}</td>
								<td>{{ $enquiry->programinterested }}</td>
								<td>{{ $enquiry->interview }}</td>
								<td>{{ $enquiry->compus }}</td>
								<td>{{ $enquiry->created_at }}</td>
								<td><a class="btn btn-mini btn-info" href="{{ route("enquirys.edit", $enquiry->id ) }}">Edit</a></td>
								@if(Auth::user()->roleid==1)

								<td class="center">
									<form method="POST" action="{{ route("enquirys.destroy", $enquiry->id) }}" accept-charset="UTF-8">
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