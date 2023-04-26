<a href="{{ url('/admin') }}" class="btn btn-success">Admin</a>
@include('layout.header')
<!-- ========================= SECTION INTRO ========================= -->
<section class="section-intro padding-y-sm">
    <div class="container">
        <div class="intro-banner-wrap">
            <img src="assets/images/banner.jpg" class="img-fluid rounded">
        </div>
    </div> <!-- container //  -->
</section>
<!-- ========================= SECTION INTRO END// ========================= -->

<!-- ========================= SECTION FEATURE ========================= -->
<section class="section-content padding-y-sm">
    <div class="container">
        <article class="card card-body">
            <div class="row">
                <div class="col-md-4">
                    <figure class="item-feature">
                        <span class="text-primary"><i class="fa fa-2x fa-truck"></i></span>
                        <figcaption class="pt-3">
                            <h5 class="title">Fast delivery</h5>
                            <p>In the competitive world of logistics, fast delivery is often seen as a key differentiator between successful and unsuccessful companies </p>
                        </figcaption>
                    </figure> <!-- iconbox // -->
                </div><!-- col // -->
                <div class="col-md-4">
                    <figure class="item-feature">
                        <span class="text-primary"><i class="fa fa-2x fa-landmark"></i></span>
                        <figcaption class="pt-3">
                            <h5 class="title">Creative Strategy</h5>
                            <p>Creative strategy involves developing innovative and unique ideas to capture the attention of the target audience and stand out from the competition
                            </p>
                        </figcaption>
                    </figure> <!-- iconbox // -->
                </div><!-- col // -->
                <div class="col-md-4">
                    <figure class="item-feature">
                        <span class="text-primary"><i class="fa fa-2x fa-lock"></i></span>
                        <figcaption class="pt-3">
                            <h5 class="title">High secured </h5>
                            <p>Our online payment system is high secured, utilizing the latest encryption technology to protect sensitive information from potential hackers or cyber threats.
                            </p>
                        </figcaption>
                    </figure> <!-- iconbox // -->
                </div> <!-- col // -->
            </div>
        </article>
    </div> <!-- container .//  -->
</section>
<!-- ========================= SECTION FEATURE END// ========================= -->

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content">
    <div class="container">
        <header class="section-heading">
            <h3 class="section-title">Popular products</h3>
        </header><!-- sect-heading -->

        <div class="row">
            @foreach ($products as $item)
                <div class="col-md-3">
                    <div href="#" class="card card-product-grid">
                        <a href="/products/show/{{ $item->id }}" class="img-wrap"> <img src="/images/{{ $item->image }}" width="30px"> </a>
                        <figcaption class="info-wrap">
                            <a href="/products/show/{{ $item->id }}" class="title">{{ $item->prodname }}</a>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Category: {{ $item->category->catname }}</li>
                                <li class="list-group-item">Price: ${{ $item->price }}</li>
                            </ul>
                            <form action="{{ route('cart.add', ['id' => $item->id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <a class="btn btn-info d-inline-block"
                                    href="{{ route('products.show', $item->id) }}">Detail</a>
                                <button type="submit" class="btn btn-primary d-inline-block">Add to Cart</button>
                            </form>
                        </figcaption>
                    </div>
                </div>
            @endforeach


        </div> <!-- container .//  -->
</section>

<!-- ========================= SECTION CONTENT END// ========================= -->

<!-- ========================= SECTION  ========================= -->
<section class="section-name bg padding-y-sm">
    <div class="container">
        <header class="section-heading">
            <h3 class="section-title">Our Brands</h3>
        </header><!-- sect-heading -->
        <div class="row">
            <div class="col-md-2 col-6">
                <figure class="box item-logo">
                    <a href="#"><img src="assets/images/logos/MSI-Logo.png"></a>
                </figure> <!-- item-logo.// -->
            </div> <!-- col.// -->
            <div class="col-md-2  col-6">
                <figure class="box item-logo">
                    <a href="#"><img src="assets/images/logos/asus-logo.jpg"></a>
                </figure> <!-- item-logo.// -->
            </div> <!-- col.// -->
            <div class="col-md-2  col-6">
                <figure class="box item-logo">
                    <a href="#"><img src="assets/images/logos/apple.png"></a>
                </figure> <!-- item-logo.// -->
            </div> <!-- col.// -->
            <div class="col-md-2  col-6">
                <figure class="box item-logo">
                    <a href="#"><img src="assets/images/logos/logo4.png"></a>
                </figure> <!-- item-logo.// -->
            </div> <!-- col.// -->
            <div class="col-md-2  col-6">
                <figure class="box item-logo">
                    <a href="#"><img src="assets/images/dell.png"></a>
                </figure> <!-- item-logo.// -->
            </div> <!-- col.// -->
            <div class="col-md-2  col-6">
                <figure class="box item-logo">
                    <a href="#"><img src="assets/images/samsung2.png"></a>
                </figure> <!-- item-logo.// -->
            </div> <!-- col.// -->
        </div> <!-- row.// -->
    </div><!-- container // -->
</section>
<!-- ========================= SECTION  END//
@include('layout.footer')
        
    </body>
