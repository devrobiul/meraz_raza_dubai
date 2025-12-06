     <footer class="footer bg-cover bg-black" data-background="">
          <div class="footer-main-area">
            <div class="container-lg">
 
              <div class="row pdt-60 pdb-65">
                <div class="col-xl-4 col-lg-6 col-md-6">
                  <div class="widget footer-widget mrr-60 mrr-md-0 mrb-sm-20">
                    <div class="footer-logo">
                      <img src="{{asset(setting('primary_logo'))}}" alt="" class="mrb-25" />
                    </div>
                    <p class="py-0">{{setting('footer_summary')}}</p>
                  </div>
                </div>
                <div class="col-xl-4  col-lg-6 col-md-6">
                  <div class="widget footer-widget mrr-30 mrr-md-0">
                    <h5 class="widget-title text-white mrb-30">Services</h5>
                    <ul class="footer-widget-list">
                        @foreach (\App\Models\Post::type('service')->get() as $service)
                            
                        <li><a href="{{ route('single.post',['type'=>'service',$service->slug]) }}">{{ $service->title }}</a></li>
                        @endforeach
          
                    </ul>
                  </div>
                </div>
       
                <div class="col-xl-4 col-lg-6 col-md-6">
                  <div class="widget footer-widget mrr-30 mrr-md-0">
                    <h5 class="widget-title text-white mrb-30">Contact</h5>
                    <address class="mrb-0">
                      <p>{{setting('address')}}</p>
                      <div class="mrb-10">
                        <a href="#"><i class="fas fa-phone-alt text-primary-color3 mrr-10"></i>{{setting('phone')}}</a>
                      </div>
                      <div class="mrb-10">
                        <a href="#"><i class="fas fa-envelope text-primary-color3 mrr-10"></i>{{setting('email')}}</a>
                      </div>
                      <div class="mrb-0">
                        <a href="#"><i class="fas fa-globe text-primary-color3 mrr-10"></i>www.merazraza.com</a>
                      </div>
                    </address>
                  </div>
                </div>
           
              </div>
            </div>
          </div>
    <div class="footer-copyright-area bg-silver pdt-30 pdb-30">
   <div class="container">
    <div class="row justify-content-between align-items-center text-center text-lg-start">
        
        <div class="col-xl-6 col-lg-6 mb-2 mb-lg-0">
            <div>
                Copyright by Meraz Raza © {{ date('Y') }}.
                All rights reserved
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 text-lg-end text-center">
    <div>
        Developed by
        <strong>Mohammad Robiul Hossain</strong>
        <span style="margin: 0 8px;">|</span>
        <a href="https://wa.me/1882850027" target="_blank">
            WhatsApp: 01882850027
        </a>
        <span style="margin: 0 8px;">|</span>
        <a href="https://robiul.me" target="_blank">robiul.me</a>
    </div>
</div>


    </div>
</div>

</div>

        </footer>