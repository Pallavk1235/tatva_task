@extends('layouts.main')
@section('content')
<div class="row" style="margin-top:20px">
	<div class="col-sm-12">
		<div class="card card-warning">
			<div class="card-header">
				<h3 class="card-title">General Elements</h3>
				<a class="btn btn-info" href="{{route('event.index')}}" style="float:right;" >
					Show Events
				</a>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				@if(isset($edits))
				<form  id="event_form" action="{{route('event.update')}}" method="POST" onsubmit="event.preventDefault(); myfunction()">
					<input type="hidden" name="id" value="{{$edits->id}}">
					@csrf
					<div class="row">
						<div class="col-sm-12">
							<!-- text input -->
							<div class="form-group">
								<label>Evenet Name<font style="color:red">*</font></label>
								<input type="text" class="form-control" placeholder="Enter ..." 
								name="event_name" id="event_name" value="{{$edits->event_name}}">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Start Date:<font style="color:red">*</font></label>
								<div class="input-group date" id="reservationdate" data-target-input="nearest">
									<input type="date" class="form-control datetimepicker-input" data-target="#reservationdate"/ name="event_start" id="event_start" 
									value="{{$edits->event_start}}">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>End Date:<font style="color:red">*</font></label>
								<div class="input-group date" id="reservationdate" data-target-input="nearest">
									<input type="date" class="form-control datetimepicker-input" data-target="#reservationdate"/ name="event_end" id="event_end" value="{{$edits->event_end }}">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<!-- select -->
							@php
								$array = explode(',', $edits->recurrence_event);
							@endphp
							<div class="form-group">
								<label>Recurrence<font style="color:red">*</font></label>

								<select class="form-control" name="recurrence_event[]" id="recurrence_event1">
									<option value="{{$array[0]}}">{{$array[0]}}</option>
									<option value="every">Every</option>
									<option value="monthly">Months</option>
									<option value="weekly">Weekly</option>
								</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Recurrence<font style="color:red">*</font></label>
								<select class="form-control" name="recurrence_event[]" id="recurrence_event2">
									<option value="{{$array[1]}}">{{$array[1]}}</option>
									<option value="day">Day</option>
									<option value="year">Year</option>
									<option value="months">Months</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<button class="btn btn-success" type="submit" style="float:right">Submit</button>
					</div>
				</form>
				@endif
			</div>
			<!-- /.card-body -->
		</div>
	</div>
</div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
})
function myfunction(){
	var  validate = 0;
	var event_name = $('#event_name').val();
	var event_start = $('#event_start').val();
	var event_end = $('#event_end').val();
	var recurrence_event1 = $('#recurrence_event1').val();
	var recurrence_event2 =$('#recurrence_event2').val();

	if(event_name == '')
	{
		swal("Error!", "Please Enter Event Name", "error");
		validate++;
		return false;
	}
	if(event_start == '')
	{
		swal("Error!", "Please Choose Event Starting Date", "error");
		validate++;
		return false;
	}
	if(event_end == '')
	{
		swal("Error!", "Please Choose Event Ending Date", "error");
		validate++;
		return false;
	}
	if(recurrence_event1 == '')
	{
		swal("Error!", "Please select recurrence", "error");
		validate++;
		return false;
	}
	if(recurrence_event2 == '')
	{
		swal("Error!", "Please select recurrence", "error");
		validate++;
		return false;
	}
	
	if(validate==0)
	{
		$('#event_form')[0].submit();
	}
} 
</script>
@endsection