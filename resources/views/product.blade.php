@extends('layouts.frontend')
@section('content')
            <!-- breadcrumb__start -->
            <div class="breadcrumb">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb__title">
                                <h1>Shop</h1>
                                <ul>
                                    <li>
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="color__blue">
                                        Shop
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <!-- breadcrumb__end -->
    
        <!-- shop__section__start-->
            <div class="shop sp_top_80">
                <div class="container">
                    <div class="row grid__responsive">
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12">
    
    
                            <button type="button" class="default__button sidebar-collapse-btn" data-aos="fade-up" data-aos-duration="1800" >
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 32 32" width="24"><g id="Layer_2" data-name="Layer 2"><path d="m28.552 6.184h-2.671a4.556 4.556 0 0 0 -8.659 0h-13.774a1.449 1.449 0 0 0 0 2.9h13.774a4.556 4.556 0 0 0 8.659 0h2.671a1.449 1.449 0 0 0 0-2.9zm-7 3.138a1.69 1.69 0 1 1 1.689-1.69 1.692 1.692 0 0 1 -1.689 1.69z"></path><path d="m28.552 14.552h-13.774a4.556 4.556 0 0 0 -8.659 0h-2.671a1.448 1.448 0 0 0 0 2.9h2.671a4.556 4.556 0 0 0 8.659 0h13.774a1.448 1.448 0 0 0 0-2.9zm-18.1 3.138a1.69 1.69 0 1 1 1.686-1.69 1.692 1.692 0 0 1 -1.69 1.69z"></path><path d="m28.552 22.919h-2.671a4.556 4.556 0 0 0 -8.659 0h-13.774a1.449 1.449 0 0 0 0 2.9h13.774a4.556 4.556 0 0 0 8.659 0h2.671a1.449 1.449 0 0 0 0-2.9zm-7 3.138a1.69 1.69 0 1 1 1.689-1.689 1.692 1.692 0 0 1 -1.689 1.689z"></path></g></svg>
                                FILTER
                            </button>
    
    
    
                            <div class="sidebar sidebar-collapse-hide">
                                <div class="sidebar__widget widget-collapse-show">
                                    <div class="sidebar__title">
                                        <h4>Categories</h4>
                                        <i class="fa fa-angle-down"></i>
                                    </div>
                                    <div class="sidebar__menu">
                                        <ul>
                                            <li>
                                                <a href="{{ route('product.index') }}" 
                                                class="{{ !isset($selectedCategory) ? 'fw-bold text-primary' : ''}}">
                                                    All Categories
                                                </a>
                                            </li>
                                            @foreach($category as $cat)
                                            <li>
                                                <a href="{{ route('product.filter', $cat->slug) }}"
                                                    class="{{ isset($selectedCategory) && $selectedCategory->id == $cat->id ? 'fw-bold text-primary' : ''}}">
                                                    {{ $cat->name }} <span>({{ $cat->product->count() }})</span>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>    
    
                            </div>
                        </div>
    
                        <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12">
                            <div class="tab-content " id="myTabContent">
                                <div class="tab-pane fade active show" id="projects__one" role="tabpanel" aria-labelledby="projects__one">
                                    <div class="row grid__responsive">
                                        @if(isset($query))
                                            <h5 class="mb-4"> Hasil pencarian untuk : <strong>{{ $query }}</strong></h5>
                                        @endif
                                        @if($product->isEmpty())
                                            <p class="text-muted"> Tidak ada produk yang cocok dengan pencarian.</p>
                                        @else
                                        @foreach($product as $data)
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6">
                                            <div class="grid__wraper">
                                                <div class="grid__wraper__img">
                                                    <div class="grid__wraper__img__inner">
                                                        <a href="/product/{{ $data->slug }}">
                                                            <img class="primary__image" src=" {{ Storage::url($data->image) }}" alt="Primary Image">
                                                            <img class="secondary__image" src=" {{ Storage::url($data->image) }}" alt="Secondary Image">
                                                        </a>
                                                    </div>
                                                    <div class="grid__wraper__icon">                                
                                                        <ul>
                
                                                            <li>
                                                                <a href="{{ route('cart.add', $data->id)}}" 
                                                                    onclick="event.preventDefault(); document.getElementById('add-to-cart-form-{{ $data->id}}').submit();" 
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="Add To Cart" data-bs-original-title="Add To Cart">
                                                                    <i class="fas fa-shopping-cart"></i>
                                                                </a>              
                                                                
                                                                <form id="add-to-cart-form-{{ $data->id }}" action="{{ route('cart.add', $data->id) }}" class="d-none" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="qty" value="1">
                                                                </form>
                                                            </li>
                
                                                        </ul>   
                                                    </div>
                
                
                                                </div>
                                                <div class="grid__wraper__info">
                                                    <h3 class="grid__wraper__tittle">
                                                        <a href="{{ url ('product/' . $data->slug )}}" tabindex="0">{{ $data->name }}</a>
                                                    </h3>
                                                    <div class="grid__wraper__price">
                                                        <span>Rp. {{ number_format($data->price, '0', '.', '.')}}</span> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- shop__section__start-->
@endsection