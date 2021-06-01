<!-- Navbar-->
<header class="nav-bar_wrap header">
    <nav class="navbar navbar-expand-lg fixed-top py-3">
        <div class="container-fluid">
            <div class="logo">
                <a href="{{ route('index') }}">
                    <img src="{{ asset('uploads/company_logos/'.$settings->logo.'') }}">
                </a>

            </div>
            <button type="button" data-toggle="collapse" data-target="#topNavHeader" aria-controls="topNavHeader" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>

            <div id="topNavHeader" class="collapse navbar-collapse">
                <ul class="topnav navbar-nav ml-auto">
                    <li class="nav-item {{ (request()->is('partners')) ? 'active' : '' }}"><a href="{{ route('existing.partner') }}" class="nav-link">Partners</a></li>
                    <li class="nav-item {{ (request()->is('solar/calculator')) ? 'active' : '' }}"><a href="{{ route('solar.calculator')}}" class="nav-link">Saving Calculator</a></li>
                    <li class="nav-item {{ (request()->is('blogs')) ? 'active' : '' }}"><a  href="{{ route('blog') }}" class="nav-link">Blog</a></li>
                    <li class="nav-item {{ (request()->is('about-us')) ? 'active' : '' }}"><a href="{{ route('about-us') }}" class="nav-link">About Us</a></li>
                    <li class="nav-item"><a href="{{ route('become.partner') }}" class="nav-link partner_btn">Become A Partner<i class="fa fa-angle-right"></i></a></li>
                    <li class="nav-item"><a href="{{ route('get.quote.now') }}" class="nav-link qoute_btn fill-border-btn"><span>Get Quote Now<i class="fa fa-angle-right"></i></span> </a></li>
                </ul>
                <ul class="navbar-nav social-icons-header">
                    <li>
                        <a href="{{$settings->facebook_url}}">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{$settings->instagram_url}}">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{$settings->whatsapp_url}}">
                            <i class="fa fa-whatsapp"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{$settings->linkedin_url}}">
                            <i class="fa fa-linkedin"></i>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
</header>

