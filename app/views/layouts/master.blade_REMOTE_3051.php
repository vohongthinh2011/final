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
	      <a class="navbar-brand" href="#">Cinemaphile</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="#">Home</a></li>
	      <li><a href="#">Movies</a></li>
	      <li><a href="#">TV</a></li>
	    </ul>
	    <form class="navbar-form navbar-left" role="search">
	  		<div class="form-group">
	    	<!--	<input type="text" class="form-control" placeholder="Search"> -->
        {{ Form::open(['action'=> 'SearchController@SearchMovieID', 'method' => 'POST']) }}

      		{{ Form::text('input', null, [ 'placeholder' => 'Movie ID', 'required']) }}

      		{{ Form:: submit('Search') }}

      		{{ Form::close() }}
	  		</div>
		</form>
		<!--sign in button-->
		<button type="button" class="btn btn-default navbar-btn navbar-left">Sign in</button>
	  </div>


	</nav>
</div>

  @yield('style')
</head>
<body>
  @yield('content')

</body>
</html>
