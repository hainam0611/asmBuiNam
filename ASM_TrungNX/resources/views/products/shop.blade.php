@include('layout.header')
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content">
    <div class="container">
        <header class="section-heading">
            <h3 class="section-title">Our products</h3>
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



@include('layout.footer')

</body>
