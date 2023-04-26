<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="icon" href="assets/images/items/1.jpg" type="image/x-icon" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <link href="/assets/css/ui.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">

    <link href="/assets/css/all.min.css" rel="stylesheet">
    <script src="/assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="/assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>

</head>

@php
    $CartController = new App\Http\Controllers\CartController();
    $cartItemCount = $CartController->count();
@endphp

<header class="section-header">
    <nav class="navbar navbar-dark navbar-expand p-0 bg-primary">
        <div class="container">
            <ul class="navbar-nav d-none d-md-flex mr-auto">
                <li class="nav-item"><a class="nav-link" href={{ url('/products') }}>Home</a></li>
                <li class="nav-item"><a class="nav-link" href={{ url('/shop') }}>Shop</a></li>
            </ul>

        </div> <!-- container //  -->
    </nav> <!-- header-top-light.// -->
    <section class="header-main border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2 col-6">
                    <a href="/products" class="brand-wrap">
                        ChelMarid store
                    </a> <!-- brand-wrap.// -->
                </div>
                <div class="col-lg-6 col-12 col-sm-12">
                    <form action="{{ route('products.search') }}" class="search">
                        <div class="input-group w-100">
                            <input type="text" class="form-control" placeholder="Search" name="search">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div> <!-- col.// -->
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="widgets-wrap float-md-right">
                        <div class="widget-header  mr-3">
                            <a href="{{ route('products.cart') }}" class="icon icon-sm rounded-circle border"><i
                                    class="fa fa-shopping-cart" style="padding-top:10px"></i></a>
                            <span class="badge badge-pill badge-danger notify">{{ $cartItemCount }}</span>

                        </div>
                    </div> <!-- widgets-wrap.// -->
                </div> <!-- col.// -->

            </div> <!-- row.// -->
        </div> <!-- container.// -->
    </section> <!-- header-main .// -->
    <nav class="navbar navbar-main navbar-expand-lg navbar-light border-bottom">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav"
                aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link pl-0" data-toggle="dropdown" href="#"><strong> <i
                                    class="fa fa-bars"></i> All category</strong></a>
                        <div class="dropdown-menu">
                            @foreach ($categories as $category)
                                <a class="dropdown-item"
                                    href="{{ route('products.catindex', $category->id) }}">{{ $category->catname }}</a>
                            @endforeach
                        </div>
                    </li>

                </ul>
            </div> <!-- collapse .// -->
        </div> <!-- container .// -->
    </nav>
</header> <!-- section-header.// -->
