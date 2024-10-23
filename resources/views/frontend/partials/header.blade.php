<div class="navbar navbar-expand-lg bg-light navbar-light sticky-top">
    <div class="container-fluid">
        <a href="{{ route('home') }}" class="navbar-brand">Food Heaven</a>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav ml-auto">
                <a href="{{ route('home') }}" class="btn btn-secondary" style="margin-right: 10px;">Home</a>
                <a href="{{ route('aboutus') }}" class="btn btn-secondary" style="margin-right: 10px;">About</a>
                <li class="nav-item dropdown">
                    <a href="#" class="btn btn-secondary nav-link" style="margin-right: 10px;" data-toggle="dropdown">
                        Category<i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $data)
                        <li><a href="{{ route('category.menu', $data->id) }}" class="dropdown-item">{{ $data->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <a href="{{ route('contact') }}" class="btn btn-secondary" style="margin-right: 10px;">Contact</a>

                <a class="btn btn-outline-secondary" style="margin-right: 10px;" href="{{ route('view.cart') }}">
                    <i class="fas fa-shopping-cart" style="margin-right: 5px;"></i>Cart({{ session()->get('cart') ? count(session()->get('cart')) : 0 }})
                </a>
                @auth('customerGuard')
                <i class='fas fa-id-card' style='font-size:24px;'> 
                    <a style="margin-right: 10px;" href="{{ route('profile.view') }}">{{ auth('customerGuard')->user()->name }}</a>
                </i>
                <a href="{{ route('logout.success') }}" class="btn btn-secondary">Log Out</a>
                @endauth
                @guest('customerGuard')
                <a href="{{ route('reg') }}" class="btn btn-secondary">Registrations</a>
                <a href="{{ route('customer.login') }}" class="btn btn-secondary">Log in</a>
                @endguest
            </div>
        </div>
    </div>
</div>
