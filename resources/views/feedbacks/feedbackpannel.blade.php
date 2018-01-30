@extends('layouts.default')
@section('content')

<div id="content">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">{{ $task->tasktitle }}</h1>
		</div>
		<ul>
			@if($task->photourl1!="")
			<li><img src="<?php url(); ?>{{ $task->photourl1 }}"  width="100" height="100"></li>
			@endif
			<li>task description : {{ $task->content }}</li>
			<li>task date : {{ $task->taskdate }}</li>

			<li>task deadline : {{ $task->deadline }}</li>
			<li>budgets : {{ $task->budget }}</li>


		</ul>
	</div>
	<!-- /.row -->
	<div class="row">
		<a class="btn btn-primary btn-mini pull-left" href="{{ route("feedbackcreate", $taskid) }}">Add New feedback</a>	</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						feedback
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>id</th>
									<th>date</th>					
									<th>feedback</th>
									<th>costs</th>
									<th>staff</th>
									
									<th>active</th>
									
									<th></th>
									<th></th>

								</tr>
							</thead>
							<tbody>

								@foreach($feedbacks as $feedback)
								<tr lass="odd gradeX">   
									<td>{{ $feedback->id }}</td>
									
									
									<td>{{ $feedback->feedbackdate }}</td>
									<td>{{ $feedback->feedback }}</td>
									<td>{{ $feedback->costs }}</td>
									<td>{{ $feedback->user->name }} <br>
									{{ $feedback->user->department }}/{{ $feedback->user->ranks }}</td>
									
									@if($feedback->active==1)
									<td><i class="fa fa-check"></i></td>
									@else
									<td></td>
									@endif
									@if($feedback->userid == Auth::user()->id)
									<td>
										<a class="btn btn-mini btn-primary" href="{{ route("feedbacks.edit", $feedback->id ) }}">Edit</a>
									</td>
									@endif
									@if(Auth::user()->roleid==1 || Auth::user()->roleid==2 || $feedback->userid == Auth::user()->id)
									<td>
										<form method="POST" action="{{ route("feedbacks.destroy", $feedback->id) }}" accept-charset="UTF-8">
											<input name="_method" type="hidden" value="DELETE">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input style="display:none;" name="taskid" type="text" value="{{ $task->id }}">
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

