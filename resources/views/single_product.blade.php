@extends('layouts.frontend')

@section('content')
<!-- Breadcrumb Start -->
<div class="breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb__title">
                    <h3>Product Details</h3>
                </div>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li class="color_blue">Product Details</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Product Detail Start -->
<div class="single_product sp_top_50 sp_bottom_80">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="featurearea__details__img">
                    <div class="featurearea__big__img">
                        <div class="featurearea__single__big__img">
                            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}">
                        </div>
                    </div>
                    <div class="featurearea__thumb__img featurearea__thumb__img_slider_active slider_default_arrow">
                        <div class="featurearea__single__thumb__img">
                            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Info -->
            <div class="col-xl-6 col-lg-6">
                <div class="single_product__wrap">
                    <div class="single_product__heading">
                        <h2>{{ $product->name }}</h2>
                    </div>
                    <div class="single_product__price mb-2">
                        <span>Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                    </div>
                    <hr>
                    <div class="single_product__description mb-3">
                        <p>{{ $product->description }}</p>
                    </div>
                    <div class="single_product__special__feature mb-3">
                        <ul>
                            <li class="product__variant__inventory">
                                <strong class="inventory__title">Availability:</strong>
                                <span class="variant__inventory">
                                    {{ $product->stock > 0 ? $product->stock . ' left in stock' : 'Out of stock' }}
                                </span>
                            </li>
                            <li>
                                @php $averageRating = $product->reviews()->avg('point'); @endphp
                                @auth
                                    @if($averageRating)
                                        <p>Rating rata-rata: <strong>{{ number_format($averageRating, 1) }}/5</strong></p>
                                    @endif
                                @endauth
                            </li>
                        </ul>
                    </div>

                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <div class="single_product__quantity mb-3">
                            <div class="qty-container me-2">
                                <button type="button" class="qty-btn-minus btn-qty">-</button>
                                <input type="number" name="qty" value="1" max="{{ $product->stock }}" class="input-qty">
                                <button type="button" class="qty-btn-plus btn-qty">+</button>
                            </div>
                            <button type="submit" class="default_button">Add to Cart</button>
                            <a href="#" class="default_button black_button">Buy it Now</a>
                        </div>
                    </form>

                    <div class="single_product__bottom__menu">
                        <ul>
                            <li><a href="#"><i class="far fa-heart"></i> Add to Wishlist</a></li>
                            <li><a href="#"><i class="fa fa-exchange-alt"></i> Compare</a></li>
                            <li><a href="#"><i class="far fa-envelope"></i> Ask a Question</a></li>
                            <li><a href="#"><i class="far fa-chart-bar"></i> Size Chart</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Review & Comment Section -->
<div class="single_product__comment sp_bottom_80">
    <div class="container">
        <div class="row g-5">
            <div class="col-xl-6">
                <div class="border p-4 rounded shadow-sm">
                    <h5 class="mb-3">Tulis Ulasan Anda</h5>
                    <form action="{{ route('review.store', $product->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="mb-3">
                            <label class="form-label">Rating</label>
                            <select name="point" id="point" class="form-select" required>
                                <option value="">Pilih rating</option>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}">{{ $i }} Bintang</option>
                                @endfor
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="comment" class="form-label">Komentar</label>
                            <textarea name="comment" id="comment" class="form-control" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Kirim Ulasan</button>
                    </form>
                </div>
            </div>

            <!-- Display Reviews -->
            <div class="col-xl-6">
                <div class="border p-4 rounded shadow-sm">
                    <h5 class="mb-3">Ulasan pelanggan</h5>
                    @forelse ($product->reviews as $review)
                        <div class="border-bottom mb-3">
                            <div class="d-flex justify-content-between mb-2">
                                <strong>{{ $review->user->name }}</strong>
                                <small class="text-muted">{{ $review->created_at->format('d M Y, H:i') }}</small>
                            </div>
                            <div class="mb-2">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $review->point ? 'text-warning' : '' }}"></i>
                                @endfor
                            </div>
                            <p class="text-muted">{{ $review->comment }}</p>
                        </div>
                    @empty
                        <p class="text-muted">Belum ada ulasan untuk produk ini.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
