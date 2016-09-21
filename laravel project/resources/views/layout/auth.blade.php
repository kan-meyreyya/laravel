<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta id="token" name="token" content="{!! csrf_token() !!}">
  	<title>Authentencation</title>
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	@yield('css')	
	
</head>
	<body>
		@yield('main_content');
		@yield('script')
	</body>
</html>