<head>
    <title>SignCiti</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="16x16"
          href="@isset($setting['favicon']){{ asset('uploads/'.$setting['favicon']) }}@endisset">
    <link rel="stylesheet" href="{{asset('front_end/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('front_end/calculator/fontawesome/css/all.css')}}">
    <script src="{{asset('front_end/js/jquery.min.js')}}"></script>
    <script src="{{asset('front_end/js/popper.min.js')}}"></script>
    <script src="{{asset('front_end/js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('front_end/css/style.css')}}">
    <script type="text/javascript">
        $(document).ready(function () {
            // executes when HTML-Document is loaded and DOM is ready
            //  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
            // breakpoint and up
            $(window).resize(function () {
                if ($(window).width() >= 980) {

                    // when you hover a toggle show its dropdown menu
                    $(".navbar .dropdown-toggle").hover(function () {
                        $(this).parent().toggleClass("show");
                        $(this).parent().find(".dropdown-menu").toggleClass("show");
                    });

                    // hide the menu when the mouse leaves the dropdown
                    $(".navbar .dropdown-menu").mouseleave(function () {
                        $(this).removeClass("show");
                    });

                    // do something here
                }
            });
            // document ready
        });
    </script>
</head>
