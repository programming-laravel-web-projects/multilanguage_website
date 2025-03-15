<!DOCTYPE html>
<html>
    @php
          $sitedataCtrlr=new App\Http\Controllers\Web\SiteDataController();
     $mainarr= $sitedataCtrlr->Fillfordash();
    @endphp
@include('admin.layouts.header')
@include('admin.layouts.leftsidebar')
@yield('content')
@include('admin.layouts.footer')

</html>
