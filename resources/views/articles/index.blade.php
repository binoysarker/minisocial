@extends('layouts.app')
@section('content')
	{{-- expr --}}
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 ">
				@forelse($articles as $article)
					<div class="panel panel-default">
					    <dev class="panel-heading ">
					        <h4 class="panel-text clearfix"> Author {{Auth::user()->name}} </h4>
					        <span class="pull-right">Posted on {{$article->created_at->diffForHumans()}} </span>
					    </dev>
					    <div class="panel-body">
					        <p>{{$article->shortContent}} </p>
					        <a href="{{ url('articles') }}/{{$article->id}} " class="btn btn-primary" title="">Read More</a>
					        {{-- if authenticated then give the delete btn --}}
					        @if ($article->user_id == Auth::user()->id)
					        	<form action="/articles/{{$article->id}} " method="POST" onsubmit="submitForm()">
									{{csrf_field()}}
									{{method_field('DELETE')}}
					        		
					        		<button type="submit" class="btn btn-danger pull-right">Delete</button>
					        	</form>
					        @endif
					    	<a href="" class="btn btn-info pull-right" title=""><i class="fa fa-heart"></i> Like</a>
					    </div> 
					    
					</div>
				@empty
				No Articles to show
				@endforelse	

				<div class="pagination">
					<li>{{$articles->links()}} </li>
				</div>

			</div>
		</div>
	</div>

	<script> 
	$(document).ready(function() {
	    $('form input[type=submit]').click(function() {
	        return confirm('Are you sure to delete?');
	    });
	});
	</script>
@endsection