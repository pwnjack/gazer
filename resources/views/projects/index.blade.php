@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Projects <span class="pull-right"><a href="/projects/create"><i class="fa fa-plus"></i>&nbsp;&nbsp; Create a new project</a></span></div>

				<div class="panel-body">
				
				@if(count($user['projects']) >0 )

				<ul>
					@foreach($user['projects'] as $project)
						<li>{!!link_to_route('projects_show', $project['title'], array('slug' => $project['slug']))!!} by {!!link_to_route('users_show', $project['creator']['username'], array('username' => $project['creator']['username']))!!} since {{$project['created_at']->diffForHumans()}} @if($project['user_id'] == \Auth::user()->id) - {!!link_to_route('projects_edit', 'Edit', array('slug' => $project['slug']))!!} @endif</li>
					@endforeach
				</ul>


				@else

					<p>
						<i>
							Currenly you don't have any open projects. {!!link_to_route('projects_create', 'Open a new one HERE.')!!}
						</i>
					</p>
		
				@endif

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
