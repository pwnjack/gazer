@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{$project['title']}} 
				@if($project['user_id'] == \Auth::user()->id) <span class="pull-right"><i class="fa fa-pencil-square-o"></i>&nbsp;&nbsp; {!!link_to_route('projects_edit', 'Edit this project', array('slug' => $project['slug']))!!}</span>@endif
				</div>

					<div class="panel-body">
					
						<div class="col-md-6">
							Created By : {!!link_to_route('users_show', $project['creator']['username'], array('username' => $project['creator']['username']))!!} <br>
							{!! $project['description'] !!}
						</div>

						<div class="col-md-4">
							Start Date : {{$project['start']->format('jS \\of F Y')}}<br>
							End Date : {{$project['end']->format('jS \\of F Y')}}
						</div>

					</div>
			</div>

			<div class="panel col-md-5 ">
				<div class="panel-heading">Team</div>

					<div class="panel-body">
					
						<div>
							@foreach($project['users'] as $user)
								<li>{!!link_to_route('users_show', $user['username'], array('username' => $user['username']))!!}</li>
							@endforeach
						</div>


					</div>
			</div>


			<div class="panel col-md-7 ">
				<div class="panel-heading">Bugs</div>

					<div class="panel-body">
					
						<div>

						@if(count($project['bugs']) >0 )
							@foreach($project['bugs'] as $bug)
								<li>{!!link_to_route('bugs_show', $bug['title'], array('id' => $bug['id']))!!}</li>
							@endforeach
						@else

							This project has no bugs. Unlikely. {!!link_to_route('bugs_create', 'Open a new one HERE.')!!}

						@endif
						</div>


					</div>
			</div>


		</div>
	</div>
</div>
@endsection
