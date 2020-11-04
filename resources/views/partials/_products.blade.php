
    <div class="col-lg-9">
        <div class="row mt-5">
            @foreach ($products as $product)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                    <a href="{{ route('products.show',$product) }}"><img class="card-img-top" src="{{ asset("storage/images/PC-HP.png") }}" alt=""></a>
                    <div class="card-body">
                        <h4 class="card-title">
                        <a href="{{ route('products.show',$product) }}" class="text-decoration-none">{{ $product->title }}</a>
                        </h4>
                        <h5>{{ '$'.$product->price }}</h5>
                        <p class="card-text">{{ $product->subtitle }}</p>
                        <a href="{{ route("products.show",$product) }}" class="btn btn-sm btn-outline-secondary">See details</a>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
        @if($links)
            {{$products->links("pagination::bootstrap-4")}}
        @endif
    </div>





