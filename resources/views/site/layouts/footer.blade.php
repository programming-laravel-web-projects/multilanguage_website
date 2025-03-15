
  <!-- ======= Footer ======= -->
  <footer id="footer">

   <!-- whatsapp -->
     <a href="https://api.whatsapp.com/send?phone={{$mainarr['whatsapp']}}&text" class="float" target="_blank">
   <i class="bx bxl-whatsapp my-float"></i>
   </a>
     <!-- whatsapp end -->
  <!-- whatsapp tmp-->
{{-- <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
<div class="elfsight-app-745a2c76-2630-4ad7-8727-2a564e63ce59" data-elfsight-app-lazy></div> --}}
  <!-- whatsapp end -->
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
        @if($fsectionsarr->where('loc_name','footer-sec-1')->first())
            <h3>{{Str::of($fsectionsarr->where('loc_name','footer-sec-1')->first()['tr_title'])->toHtmlString()}}</h3>  
          {{Str::of($fsectionsarr->where('loc_name','footer-sec-1')->first()['tr_content'])->toHtmlString()}}     
        @endif
        </div>

          <div class="col-lg-3 col-md-6 footer-links">
            @if($fsectionsarr->where('loc_name','footer-sec-2')->first())
            <h4>{{Str::of($fsectionsarr->where('loc_name','footer-sec-2')->first()['tr_title'])->toHtmlString()}}</h4>
            {{Str::of($fsectionsarr->where('loc_name','footer-sec-2')->first()['tr_content'])->toHtmlString()}} 
            @endif
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            @if($fsectionsarr->where('loc_name','footer-sec-3')->first())
            <h4>{{Str::of($fsectionsarr->where('loc_name','footer-sec-3')->first()['tr_title'])->toHtmlString()}}</h4>
            {{Str::of($fsectionsarr->where('loc_name','footer-sec-3')->first()['tr_content'])->toHtmlString()}} 
            @endif
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            @if($fsectionsarr->where('loc_name','footer-social-title')->first())
            <h4>{{Str::of($fsectionsarr->where('loc_name','footer-social-title')->first()['tr_title'])->toHtmlString()}} </h4>
            {{Str::of($fsectionsarr->where('loc_name','footer-social-title')->first()['tr_content'])->toHtmlString()}} 
            @endif
            <div class="social-links mt-3">
              @foreach ($mainarr['f_social_list'] as $socialrow )  
              <a href="{{ $socialrow['link'] }}" class="{{ $socialrow['code'] }}"><i class="bx bxl-{{ $socialrow['code'] }}"></i></a>
              @endforeach
            
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container py-4">
      @if($fsectionsarr->where('loc_name','footer-bottom')->first())
      {{Str::of($fsectionsarr->where('loc_name','footer-bottom')->first()['tr_content'])->toHtmlString()}} 
  @endif
    </div>
 
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
 
  <!-- Vendor JS Files -->
  <script src="{{URL::asset('assets/site/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{URL::asset('assets/site/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{URL::asset('assets/site/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{URL::asset('assets/site/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{URL::asset('assets/site/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{URL::asset('assets/site/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{URL::asset('assets/site/assets/vendor/waypoints/noframework.waypoints.js')}}"></script>

  @yield('js')
  <!-- Template Main JS File -->
  <script src="{{URL::asset('assets/site/assets/js/main.js')}}"></script>

 
</body>

 