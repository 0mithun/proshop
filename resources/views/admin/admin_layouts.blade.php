<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Ecommerce Site Admin Panel</title>

    <!-- vendor css -->
    <link href="{{ asset('backend')  }}/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{ asset('backend')  }}/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="{{ asset('backend')  }}/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="{{ asset('backend')  }}/lib/rickshaw/rickshaw.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

    @yield('admin_styles')

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ asset('backend')  }}/css/starlight.css">

    <style>
        .close{
            cursor: pointer;
        }
        .close:hover
        {
            box-sizing: border-box!important;
            background-color: rgba(0,0,0,.5)!important;
            padding: 3px 6px!important;
            color: white;
            border-radius: 10px;
             font-size: 1rem;
             font-weight: normal;
            line-height: 1;
            /* text-shadow: 0 1px 0 #fff; */
            opacity: .5;
        }

        .close:focus{
            outline: none;
        }
    </style>
</head>

<body>
    @guest
    @else

        @include('admin.partial._sidebar')
        @include('admin.partial._header')
        @include('admin.partial._rightpanel')

    @endguest
    @yield('admin_content')
<script src="{{ asset('backend')  }}/lib/jquery/jquery.js"></script>
<script src="{{ asset('backend')  }}/lib/popper.js/popper.js"></script>
<script src="{{ asset('backend')  }}/lib/bootstrap/bootstrap.js"></script>
<script src="{{ asset('backend')  }}/lib/jquery-ui/jquery-ui.js"></script>
<script src="{{ asset('backend')  }}/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    @yield('admin_scripts')
<script src="{{ asset('backend')  }}/lib/jquery.sparkline.bower/jquery.sparkline.min.js"></script>
<script src="{{ asset('backend')  }}/lib/d3/d3.js"></script>
<script src="{{ asset('backend')  }}/lib/rickshaw/rickshaw.min.js"></script>
<script src="{{ asset('backend')  }}/lib/chart.js/Chart.js"></script>
<script src="{{ asset('backend')  }}/lib/Flot/jquery.flot.js"></script>
<script src="{{ asset('backend')  }}/lib/Flot/jquery.flot.pie.js"></script>
<script src="{{ asset('backend')  }}/lib/Flot/jquery.flot.resize.js"></script>
<script src="{{ asset('backend')  }}/lib/flot-spline/jquery.flot.spline.js"></script>

<script src="{{ asset('backend')  }}/js/starlight.js"></script>
<script src="{{ asset('backend')  }}/js/ResizeSensor.js"></script>
<script src="{{ asset('backend')  }}/js/dashboard.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>


<script>
        @if(Session::has('messege'))
    var type="{{Session::get('alert-type','info')}}"
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('messege') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('messege') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('messege') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('messege') }}");
            break;
    }
    @endif
</script>

<script>
    $(document).on("click", ".delete", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        swal({
            title: "Are you Want to delete?",
            text: "Once Delete, This will be Permanently Delete!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = link;
                }
            });
    });
</script>

</body>
</html>
