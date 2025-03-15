<head>
 <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-TT5SZGTJ');</script>
  <!-- End Google Tag Manager -->
  
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
  
    <title>{{ $mainarr['title']}} @yield('page-title')</title>
    <meta content="{{ $mainarr['desc']}}" name="description">
    <meta content="{{ $mainarr['meta']}}" name="keywords">
  
    <!-- Favicons -->
    <link href="{{ $mainarr['favicon']}}" rel="icon">
    <link href="{{ $mainarr['favicon']}}" rel="apple-touch-icon">
  
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    
    <!-- Vendor CSS Files -->

    <link href="{{URL::asset('assets/site/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/site/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/site/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/site/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/site/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/site/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  
    <!-- Template Main CSS File -->
    @if( $defultlang->code=='ar')
      <link href="{{URL::asset('assets/site/assets/css/style-rtl.css')}}" rel="stylesheet">
    @else
      <link href="{{URL::asset('assets/site/assets/css/style.css')}}" rel="stylesheet">
    @endif
  
    <link href="{{URL::asset('assets/site/assets/css/custom-style.css')}}" rel="stylesheet">
  </head>