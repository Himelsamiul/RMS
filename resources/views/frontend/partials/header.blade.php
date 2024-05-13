<div class="navbar navbar-expand-lg bg-light navbar-light">
            <div class="container-fluid">
                <a href="index.html" class="navbar-brand">Olivia </span></a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto">

                    
                    

                    
               
                     
                      
                        <a href="{{route('home')}}" class="btn btn-secondary">Home</a>
                        <a href="{{route('aboutus')}}"class="btn btn-secondary">About</a>
                        
                        <li class="nav-item dropdown">
                        <a href=""class="btn btn-secondary" class="nav-link" data-toggle="dropdown">Category<i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            
                            @foreach($categories as $data)
                            
                            <li><a href="{{route('category.menu',$data->id)}}" class="dropdown-item">{{$data->name }}</a></li>
                            @endforeach
                        </ul>   
                    </li>
                        
                        
                    
                        <a href="{{route('contact')}}"class="btn btn-secondary">Contact</a>
                        
                        <a class="btn btn-outline-secondary" href="{{route('view.cart')}}">Cart({{session()->get('cart') ? count(session()->get('cart')) : 0}})">
                         
                                       
                           <span class="navbar navbar-expand-lg bg-light navbar-light">
      
                      </span>
                     </a>
                     @auth('customerGuard')
                     <i class='fas fa-id-card' style='font-size:24px;'>{{auth('customerGuard')->user()->name}}</i>

                    
                     

                     
                     
                     <a href="{{route('logout.success')}}"class="btn btn-secondary">Log Out</a>



                     @endauth
                     @guest('customerGuard')
                     <a href="{{ route('reg') }}" class="btn btn-secondary">Registrations</a>


                     <a href="{{route('customer.login')}}" class="btn btn-secondary">Log in</a>

                     @endguest
                     


                    </div>
                </div>
            </div>
        </div>