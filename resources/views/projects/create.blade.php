@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Create a new project</div>
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

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<!-- <div class="form-group">
							<label class="col-md-4 control-label"></label>
							<div class="col-md-6">
								<a class="btn btn-primary btn-block"><i class="fa fa-github fa-fw"></i> &nbsp;Import from github</a>
							</div>
						</div> -->

						<div class="form-group">
							<label class="col-md-4 control-label">Title</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="title" value="{{ old('title') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Description</label>
							<div class="col-md-6">
								<textarea class="form-control" rows="7" name="description" >{{ old('description') }}</textarea>
							</div>
						</div>


						<div class="form-group">
							{!!Form::label('start', 'Date start:', ['class' => 'col-md-4 control-label'])!!}
							<div class="col-md-6">
							{!!Form::input('date', 'start', date('Y-m-d'), ['class' => 'form-control'])!!}
							</div>
						</div>

						<div class="form-group">
							{!!Form::label('end', 'Date end:', ['class' => 'col-md-4 control-label'])!!}
							<div class="col-md-6">
							{!!Form::input('date', 'end', date('Y-m-d'), ['class' => 'form-control'])!!}
							</div>
						</div>

						<div class="form-group">
							{!!Form::label('users[]', 'Team:', ['class' => 'col-md-4 control-label'])!!}
							<div class="col-md-6">
							{!!Form::select('users[]', $users, \Auth::user()->id, ['class' => 'form-control make-awesome', 'multiple'])!!}
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary btn-block">
									Create
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
