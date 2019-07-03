<html>
    <head>
        <link rel="stylesheet" href="{{ url('css/app.css') }}">
        <title>OnlineStore</title>
    </head>
    <body>
        <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
                <div class="navbar-brand">
                    <img src="logo.png" alt="" height="68px">
                    <span>OnlineStore.ly</span>
                </div>

                <button class="navbar-toggler" data-toggle="collapse" data-target="#myNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="myNav" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('products/create') }}" class="nav-link">Add Product</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('products') }}" class="nav-link">Products</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Cart</a>
                    </li>
                    </ul>
                </div>
                </nav>

        <div class="container mt-5">
            {{-- Specifying a section to embed another view code inside it --}}
            @yield('content')
        </div>
    </body>
</html>
