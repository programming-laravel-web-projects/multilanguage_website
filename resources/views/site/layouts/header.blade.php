<body>  
  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TT5SZGTJ"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
    <!-- ======Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          @if($mainarr['emailrow']->is_active==1)
          <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:{{$mainarr['emailrow']->value1}}">{{ $mainarr['emailrow']->value1 }}</a></i>
          @endif
          @if($mainarr['phonerow']->is_active==1)
          <i class="bi bi-phone d-flex align-items-center ms-4 topbar-phone"><span>{{ $mainarr['phonerow']->value1 }}</span></i>
          @endif
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
          @foreach ($mainarr['h_social_list'] as $socialrow )           
          <a href="{{ $socialrow['link'] }}" class="{{ $socialrow['code'] }}"><i class="bi bi-{{$socialrow['code']}}"></i></a>
          @endforeach
    
        </div>
      </div>
    </section>
  
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
     
      
      <div class="container d-flex align-items-center justify-content-between">
  
        {{-- <h1 class="logo"><a href="index.html">BizLand<span>.</span></a></h1> --}}
        <!-- Uncomment below if you prefer to use an image logo -->
        <a  href="{{ url('lang',$transarr['langs']->first()->code)}}" class="logo"><img src="{{ $mainarr['logo']}}" alt=""></a>
  
        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto @if($active_item=='home') active @endif" href="{{ url('lang',$transarr['langs']->first()->code)}}"> <span>{{Str::of($menuarr->first()['tr_title'])->toHtmlString()}}</span></a></li>
            @foreach ($menuarr->skip(1) as $item)
            <li  @if(sizeof($item['sons'])) 
              class="dropdown"  @endif >           
              <a class="nav-link scrollto @if(isset($category)) @if($category['code']==$item['code'] ||$item['code']==$active_item ) active @endif  @endif"
              @if(sizeof($item['sons'])&& $item['code']=='company')
               href="#"
               @else
               href="{{ url('/lang'.'/'.$transarr['langs']->first()->code.'/page'.'/'.$item['slug']) }}"
               @endif
               >
              <span>{{Str::of($item['tr_title'])->toHtmlString()}}</span>
              @if(sizeof($item['sons']))             
              <i class="bi bi-chevron-down"></i> @endif </a>
              @if(sizeof($item['sons'])) 
             
              <ul>
                @foreach ($item['sons'] as $subitem)
                <li><a href="{{ url('/lang'.'/'.$transarr['langs']->first()->code.'/page'.'/'.$subitem['slug']) }}">
                  {{Str::of( $subitem['tr_title'])->toHtmlString()}}</a></li>
                @endforeach
              </ul>
              @endif
            </li>
          
            @endforeach
           
            <li class="dropdown"><a href="#"><img class="selected-lang-img"  width="25" height="20" src="{{$defultlang->image_path}}">
              <span>{{$defultlang->name }}</span><i class="bi bi-chevron-down"></i></a>
              <ul>
                @foreach ( $transarr['langs']->skip(1) as $langrow )
                <li><a class="lang-menu" 

  @if(isset($postcontent))  
  href="{{route(\Illuminate\Support\Facades\Route::currentRouteName(),['lang' => $langrow->code,'slug'=>$category['slug'],'postslug'=>$postcontent['slug']])}}"
      @elseif(isset($category))
      href="{{route(\Illuminate\Support\Facades\Route::currentRouteName(),['lang' => $langrow->code,'slug'=>$category['slug']])}}"
 
    @else  
    href="{{route(\Illuminate\Support\Facades\Route::currentRouteName(),['lang' => $langrow->code])}}"
 @endif
 >             
                 
                  <img  width="25" height="20" src="{{$langrow->image_path}}"><span class="lang-menu-name">{{ $langrow->name }}</span></a></li>
                @endforeach
             
              </ul>
            </li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
  
      </div>
    </header><!-- End Header -->

    @if ($catalog)
    @if ($catalog['mediastore']->first())
    <div class="icon-bar  nav-menu-side" >
      {{-- <a href="#" class="catlog">face<i class="fa"></i></a>  --}}
      <ul>
        <li><a href="{{ $catalog['mediastore']->first()['image_path'] }}" target="_blank" class="nav-link  active"><i class="bx bx-file-blank"></i><span>{{ $catalog['tr_title'] }}</span></a></li>
        </ul>
    </div>
 @endif
 @endif
  
    
  