@extends('layouts.main')
@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Striped Full Width Table</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body p-0">
				<table class="table table-striped">
					<thead>
						<tr>
							<th style="width: 10px">#</th>
							<th>Event Name</th>
							<th>Dates</th>
							<th>Recurrence</th>
							<th>Delete</th>
							<th>Update</th>
						</tr>
					</thead>
					<tbody>
						@if(isset($data))
						<tr>
							<td>{{$data->id}}</td>
							<td>{{$data->event_name}}</td>
							<td>{{$data->event_start}} To {{$data->event_end}}</td>
							<td>{{$data->recurrence_event}}</td>
							<td><a class="btn btn-danger" href={{"/delete/event/".$data->id}}>Delete</a></td>
							<td><a class="btn btn-success" href={{"/edit/event/".$data->id}}>Update</a></td>
						</tr>
						@endif
					</tbody>
				</table>
			</div>
			<!-- /.card-body -->
		</div>	
	</div>	
</div>
@endsection