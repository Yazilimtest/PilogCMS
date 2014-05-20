
          
<!DOCTYPE html>
<html lang="en">
  <head>
      <title>{{ Setting::getMeta()['site_title'] }}</title>

      <meta name="description" content="{{ Setting::getMeta()['meta_description'] }}">
      <meta name="keywords" content="{{ Setting::getMeta()['meta_keywords'] }}">
      <meta name="author" content="Mehmet Sami Uslusoy, Samet Macit">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>STANLEY - Free Bootstrap Theme </title>

    <!-- Bootstrap core CSS -->
	        {{ HTML::style('stanley/assets/css/bootstrap.css') }}



    <!-- Custom styles for this template -->
		        {{ HTML::style('stanley/assets/css/main.css') }}


    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>



	@include('frontend/_layout/menu')
@yield('content')
@include('frontend/_layout/footer')
	

	

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	{{ HTML::script('stanley/assets/js/bootstrap.min.js') }}

  </body>
</html>


    