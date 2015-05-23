@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Edit project : {{$project['title']}}</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					
					{!!Form::open(array('files'=>true ,'class' => 'form-horizontal', 'role' => 'form'))!!}

						<input type="hidden" name="id" value="{{ $project['id'] }}">
						<input type="hidden" name="user_id" value="{{ \Auth::user()->id }}">

						<!-- <div class="form-group">
							<label class="col-md-4 control-label"></label>
							<div class="col-md-6">
								<a class="btn btn-primary btn-block"><i class="fa fa-github fa-fw"></i> &nbsp;Import from github</a>
							</div>
						</div> -->

						<div class="form-group">
							<label class="col-md-4 control-label">Title</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="title" value="{{ old('title', $project['title']) }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Description</label>
							<div class="col-md-6">
								<textarea class="form-control" rows="7" name="description" >{{ old('description', $project['description']) }}</textarea>
							</div>
						</div>


						<div class="form-group">
							{!!Form::label('start', 'Date start:', ['class' => 'col-md-4 control-label'])!!}
							<div class="col-md-6">
							{!!Form::input('date', 'start',$project['start']->format('Y-m-d'), ['class' => 'form-control'])!!}
							</div>
						</div>

						<div class="form-group">
							{!!Form::label('end', 'Date end:', ['class' => 'col-md-4 control-label'])!!}
							<div class="col-md-6">
							{!!Form::input('date', 'end', $project['end']->format('Y-m-d'), ['class' => 'form-control'])!!}
							</div>
						</div>

						<div class="form-group">
							{!!Form::label('users[]', 'Team:', ['class' => 'col-md-4 control-label'])!!}
							<div class="col-md-6">
							{!!Form::select('users[]', $users, array_pluck($project['users'], 'id'), ['class' => 'form-control make-awesome', 'multiple'])!!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Attachments</label>
							<div class="col-md-6">
								<input type="file" class="form-control" name="attachments[][file]"><br>
								<input type="text" class="form-control" name="attachments[][title]" placeholder="Attachment title">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary btn-block">
									Update
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
