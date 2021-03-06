<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard</title>
  <link rel="stylesheet" href="{{asset('backend/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('backend/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('backend/css/vendor.bundle.addons.css')}}">
  <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
  <link rel="shortcut icon" href="{{asset('backend/images/logo_2H_tech.png')}}" />
</head>
    <body>
        <div class="container-scroller">
            @include('partials.admin_header')  
            <div class="container-fluid page-body-wrapper">
                @include('partials.admin_sidebar')
                @yield('content')
            </div>
        </div>
    <script src="{{asset('backend/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('backend/js/vendor.bundle.addons.js')}}"></script>
    <script src="{{asset('backend/js/off-canvas.js')}}"></script>
    <script src="{{asset('backend/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('backend/js/template.js')}}"></script>
    <script src="{{asset('backend/js/settings.js')}}"></script>
    <script src="{{asset('backend/js/todolist.js')}}"></script>
    <script src="{{asset('backend/js/dashboard.js')}}"></script>
    <script src="{{asset('backend/js/data-table.js')}}"></script>
    <script src="{{asset('backend/js/bootbox.min.js')}}"></script>
    <script>
		$(document).on("click", "#delete", function(e){
		e.preventDefault();
		var link = $(this).attr("href");
		bootbox.confirm("Do you want to delete this?", function(confirmed){
			if (confirmed){
				window.location.href = link;
			};
		});
	});
	</script>
    </body>
</html>

