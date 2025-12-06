   <header class="header_style_02">
       <nav class="main-menu sticky-header">
           <div class="main-menu-wrapper">
               <div class="main-menu-logo">
                   <a href="{{ route('home') }}">
                       <img src="{{ asset(setting('primary_logo')) }}" width="165" height="72" alt="logo" />
                   </a>
               </div>
               <ul class="main-nav-menu">
                   <li class="{{ request()->routeIs('home') ? 'current' : '' }}"><a href="{{ route('home') }}">Home</a>
                   </li>
                   <li class="{{ request()->routeIs('about-me') ? 'current' : '' }}"><a
                           href="{{ route('about-me') }}">About
                           me</a></li>
                   <li class="{{ request()->routeIs('services') ? 'current' : '' }}"><a
                           href="{{ route('services') }}">Services</a></li>
                   <li class="{{ request()->routeIs('portfolio') ? 'current' : '' }}"><a
                           href="{{ route('portfolio') }}">Porfolio's</a></li>
                   <li class="{{ request()->routeIs('blog') ? 'current' : '' }}"><a
                           href="{{ route('blog') }}">Blog</a>
                   </li>
                   <li class="{{ request()->routeIs('gallery') ? 'current' : '' }}"><a
                           href="{{ route('gallery') }}">Gallery</a>
                   </li>
                   <li class="{{ request()->routeIs('contact-me') ? 'current' : '' }}"><a
                           href="{{ route('contact-me') }}">Contact me</a></li>



               </ul>
               <div class="main-menu-right">
                   <ul class="social-list d-lg-block d-none">
                       <li>
                           <a href="{{ setting('facebook') }}"><i class="fab fa-facebook-f"></i></a>
                       </li>
                       <li>
                           <a href="{{ setting('twitter') }}"><i class="webexbase-icon-twitter-2"></i></a>
                       </li>
                       <li>
                           <a href="{{ setting('instagram') }}"><i class="fab fa-instagram"></i></a>
                       </li>
                       <li>
                           <a href="{{ setting('linkedin') }}"><i class="webexbase-icon-linkedin2"></i></a>
                       </li>
                   </ul>

                   <a href="#" class="mobile-nav-toggler">
                       <span></span>
                       <span></span>
                       <span></span>
                   </a>
               </div>
           </div>
       </nav>
   </header>

   <div class="mobile-nav-wrapper">
       <div class="mobile-nav-overlay mobile-nav-toggler"></div>
       <div class="mobile-nav-content">
           <a href="#" class="mobile-nav-close mobile-nav-toggler">
               <span></span>
               <span></span>
           </a>
           <div class="side-panel-logo logo-box">
               <a href="{{ route('home') }}" aria-label="logo image">
                   <img src="{{ asset(setting('primary_logo')) }}" alt="{{ setting('app_name') }}" />
               </a>
           </div>
           <div class="mobile-nav-container"></div>
           <ul class="list-items mobile-sidebar-contact">
               <li><span class="fa fa-map-marker-alt mrr-10 text-primary-color"></span>{{ setting('address') }}</li>
               <li><span class="fas fa-envelope mrr-10 text-primary-color"></span><a
                       href="mailto:{{ setting('email') }}">{{ setting('email') }}</a></li>
               <li><span class="fas fa-phone-alt mrr-10 text-primary-color"></span><a
                       href="tel:{{ setting('phone') }}">{{ setting('phone') }}</a></li>
           </ul>
           <ul class="social-list list-primary-color">
               <li>
                   <a href="{{ setting('facebook') }}"><i class="fab fa-facebook"></i></a>
               </li>
               <li>
                   <a href="{{ setting('twitter') }}"><i class="webexbase-icon-twitter-2"></i></a>
               </li>
               <li>
                   <a href="{{ setting('instagram') }}"><i class="fab fa-instagram"></i></a>
               </li>
               <li>
                   <a href="{{ setting('linkedin') }}"><i class="webexbase-icon-linkedin2"></i></a>
               </li>
           </ul>
       </div>
   </div>
