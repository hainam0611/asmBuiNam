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
      <a href="#" class="img-wrap"> <img src="/images/{{ $item->image }}" width="30px"> </a>
      <figcaption class="info-wrap">
        <a href="#" class="title">{{ $item->prodname }}</a>
        
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Category: {{ $item->category->catname }}</li>
          <li class="list-group-item">Price: ${{ $item->price }}</li>
        </ul>

        <form action="{{ route('products.destroy', $item->id) }}" method="POST">
          <a class="btn btn-info" href="{{ route('products.show', $item->id) }}">Detail</a>
          <button type="submit" class="btn btn-primary">Buy</button>
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


