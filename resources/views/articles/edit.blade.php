@extends('layouts.app')
@section('content')
	{{-- expr --}}
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 table-bordered ">
				<form method="POST" action="/articles/{{$article->id}}">
					{{csrf_field()}}
					{{method_field('PUT')}}
					<input type="hidden" name="user_id" value="{{Auth::user()->id}} " >
					<legend>Edit Article</legend>
					<fieldset class="form-group">
						<label for="content">Content</label>
						<textarea name="content" id="content" rows="5" class="form-control" >{{$article->content}}</textarea>
					</fieldset>
					<fieldset class="form-group">
						<label for="live">Live </label>
						<input type="checkbox"  name="live" id="live" {{$article->live == 1 ? 'checked' : ''}} >
						
					</fieldset>
					<fieldset class="form-group">
						<label for="post_on">Post On</label>
						<input type="datetime-local" name="post_on" class="form-control" value="{{$article->post_on->format('Y-m-d\TH:i:s')}} " placeholder="">
						
						
					</fieldset>
					<fieldset class="form-group">
						<input type="submit" class="btn btn-primary pull-right" name="submit" value="Edit" >
					</fieldset>
				</form>
			</div>
		</div>
	</div>
@endsection