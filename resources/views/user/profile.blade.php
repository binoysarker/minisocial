@extends('layouts.app')
	<style type="text/css" media="screen">
		.profile-img{
			height: 10rem;
			width: 10rem;
			border-radius: 100%;

		}
	</style>
@section('content')
	{{-- expr --}}
	<div class="col-lg-6 col-lg-offset-3">
		<div class="panel panel-default">
		    
		    <div class="panel-body text-center">
		        <img class="profile-img" src="https://lh4.googleusercontent.com/-KrUpjv4wae8/AAAAAAAAAAI/AAAAAAAAHhM/iGPGrEMUnwQ/photo.jpg" alt="">
		        <h2>Hello {{$user->name}} </h2>
		        <h2>Email {{$user->email}} </h2>
		        <h2>Username {{$user->username}}  </h2>
		        <h2>Your Exect date of birth is {{$user->dob->format('l j F Y')}} </h2>
		        <h2>You are {{$user->dob->age}} years old </h2>
		        <button type="button" class="btn btn-primary">Follow</button>
		    </div> 
		</div>
	</div>
@endsection