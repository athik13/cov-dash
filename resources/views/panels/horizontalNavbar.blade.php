<div class="navbar @if(($configData['isNavbarFixed'])=== true){{'navbar-fixed'}} @endif">
  <nav
    class="{{$configData['navbarMainClass']}} @if(($configData['isNavbarDark'])=== true) {{'navbar-dark'}} @elseif(($configData['isNavbarDark'])=== false) {{'navbar-light'}} @elseif(!empty($configData['navbarBgColor'])) {{$configData['navbarBgColor']}} @else {{$configData['navbarMainColor']}} @endif">
    <div class="nav-wrapper">
      <ul class="left">
        <li>
          <h1 class="logo-wrapper">
            <a class="brand-logo darken-1" href="{{asset('/')}}">
              <img src="{{asset($configData['smallScreenLogo'])}}" alt="CovidMV logo">
              <span class="logo-text hide-on-med-and-down">
                @if(!empty ($configData['templateTitle']))
                {{$configData['templateTitle']}}
                @else
                Covid - 19
                @endif
              </span>
            </a>
          </h1>
        </li>
      </ul>
  </nav>
</div>
