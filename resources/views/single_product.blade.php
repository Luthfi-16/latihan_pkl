@extends('layouts.frontend')
@section('content')
            <!-- breadcrumb__start -->
            <div class="breadcrumb">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb__title">
                                <h1>Product</h1>
                                <ul>
                                    <li>
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="color__blue">
                                        Product Details
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <!-- breadcrumb__end -->
    
    
    
       <!-- single__product__start -->
       <div class="single__product sp_top_50 sp_bottom_80">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="featurearea__details__img">
    
                        <div class="featurearea__big__img">
                            <div class="featurearea__single__big__img">
                                <img src="{{asset ('assets/frontend/img/grid/grid__1.png')}}" alt="Product Big Img">
                            </div>
                            <div class="featurearea__single__big__img">
                                <img src="{{asset ('assets/frontend/img/grid/grid__3.png')}}" alt="Product Big Img">
                            </div>
                            <div class="featurearea__single__big__img">
                                <img src="{{asset ('assets/frontend/img/grid/grid__5.png')}}" alt="Product Big Img">
                            </div>
                            <div class="featurearea__single__big__img">
                                <img src="{{asset ('assets/frontend/img/grid/grid__7.png')}}" alt="Product Big Img">
                            </div>
                            <div class="featurearea__single__big__img">
                                <img src="{{asset ('assets/frontend/img/grid/grid__9.png')}}" alt="Product Big Img">
                            </div>
                            <div class="featurearea__single__big__img">
                                <img src="{{asset ('assets/frontend/img/grid/grid__11.png')}}" alt="Product Big Img">
                            </div>
                            <div class="featurearea__single__big__img">
                                <img src="{{asset ('assets/frontend/img/grid/grid__13.png')}}" alt="Product Big Img">
                            </div>
                        </div>
                        <div class=" featurearea__thumb__img featurearea__thumb__img__slider__active slider__default__arrow">
                            <div class="featurearea__single__thumb__img">
                                <img src="{{asset ('assets/frontend/img/grid/grid__1.png')}}" alt="Product Big Img">
                            </div>
                            <div class="featurearea__single__thumb__img">
                                <img src="{{asset ('assets/frontend/img/grid/grid__3.png')}}" alt="Product Big Img">
                            </div>
                            <div class="featurearea__single__thumb__img">
                                <img src="{{asset ('assets/frontend/img/grid/grid__5.png')}}" alt="Product Big Img">
                            </div>
                            <div class="featurearea__single__thumb__img">
                                <img src="{{asset ('assets/frontend/img/grid/grid__7.png')}}" alt="Product Big Img">
                            </div>
                            <div class="featurearea__single__thumb__img">
                                <img src="{{asset ('assets/frontend/img/grid/grid__9.png')}}" alt="Product Big Img">
                            </div>
                            <div class="featurearea__single__thumb__img">
                                <img src="{{asset ('assets/frontend/img/grid/grid__11.png')}}" alt="Product Big Img">
                            </div>
                            <div class="featurearea__single__thumb__img">
                                <img src="{{asset ('assets/frontend/img/grid/grid__12.png')}}" alt="Product Big Img">
                            </div>
                        </div>
    
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="single__product__wrap">
                        <div class="single__product__heding">
                            <h2>B. Pair of Blue Shoes</h2>
                        </div>
                        <div class="single__product__price">
                            <span>$70.00</span>
                            <del>$90.00</del>
                            <label>Save -25%</label>
                        </div>
    
                        <hr>
    
    
                        <div class="single__product__description">
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                        </div>
                         
                            <div class="single__product__special__feature">
    
    
                                <ul>
                                  <li class="product__variant__inventory">
                                    <strong class="inventory__title">Availability:</strong>
                                    <span class="variant__inventory">17 left in stock</span>
                                  </li>
                                </ul>
                           
                              </div>
    
                              <hr>
    
                              <div class="single__product__quantity">
                                <div class="qty-container">
                                    <button class="qty-btn-minus btn-qty" type="button">-</button>
                                    <input type="text" name="qty" value="1" class="input-qty">
                                    <button class="qty-btn-plus btn-qty" type="button">+</button>
                                </div>
                                <a class="default__button" href="#"><i class="fas fa-shopping-cart"></i> Add to cart</a>
    
                                <a class="default__button black__button" href="#">Buy it now</a>
                              </div>
                            </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <!-- single__product__end -->
    
    
                <!-- contact__section__start  -->
                <div class="single__product__contact sp_bottom_80">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="single__product__contact__text text-center">
                                    <h2>For furthermore help, contact with our support team.</h2>
                                    <div class="single__product__contact__button">
                                    <a href="#" class="default__button">Contact Us</a>
                                </div>
                                <h3 class="single__product__contact__number"><i class="fas fa-phone"></i> +0123-456-789</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- contact__section__end  -->
@endsection