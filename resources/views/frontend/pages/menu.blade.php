@extends('frontend.webpage')
@section('content')

<div class="menu">
    <div class="container">
        <div class="section-header text-center">
            <p>Food Menu</p>
            <h2>Delicious Food Menu</h2>
        </div>
        <div class="menu-tab">
            <ul class="nav nav-pills justify-content-center">
                <!-- Optionally, you can add categories here if needed -->
            </ul>
            <div class="tab-content">
                <div id="burgers" class="container tab-pane active">
                    <div class="row">
                        @foreach($menus as $menu)
                            <div class="col-lg-7 col-md-12">
                                <div class="menu-item">
                                    <div class="menu-img">
                                        <img src="{{ url('/app/image/menu/' . $menu->image) }}" alt="{{ $menu->name }}">
                                    </div>
                                    <div class="menu-text">
                                        <h3>
                                            <span>{{ $menu->name }}</span> 
                                            <strong>
                                                @if($menu->discount > 0)
                                                    {{ $menu->price - $menu->discount }} BDT
                                                @else
                                                    {{ $menu->price }} BDT
                                                @endif
                                            </strong>
                                        </h3>
                                        <p>{{ $menu->description }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 d-none d-lg-block">
                                <img src="img/menu-burger-img.jpg" alt="Image">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
