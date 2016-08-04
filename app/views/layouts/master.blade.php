<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  @yield('title')
	  <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<div class="container-fluid">
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="home">Cinemaphile</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="home">Home</a></li>
	      <li><a href="movies">Movies</a></li>
	      <li><a href="tv">TV</a></li>
	    </ul>
	    <button type="button" class="btn btn-default navbar-btn navbar-right"><a href="signup">Sign Up</a></button>
	    <!--sign in button-->
		<button type="button" class="btn btn-default navbar-btn navbar-right"><a href="login">Login</a></button>
	    <form class="navbar-form navbar-right" role="search">
	  		<div class="form-group">
	    		<!--<input type="text" class="form-control" placeholder="Movie ID">-->
	    		{{ Form::open(['action'=> 'SearchController@SearchMovieID', 'method' => 'POST']) }}

			{{ Form::text('input', null, [ 'placeholder' => 'Movie ID', 'required']) }}

			{{ Form:: submit('Sign Up') }}

			{{ Form::close() }}
	    		<a href="/search" class="btn btn-link">Search</a>
	  		</div>
		</form>
	  </div>


	</nav>
	</div>

  @yield('style')
</head>
<body>
  @yield('content')

</body>
</html>
