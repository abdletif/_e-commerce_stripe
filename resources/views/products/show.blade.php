@include('partials._header')

@include('partials._nav')


  <div class="container mb-5"><br>
      <div class="card mb-5">
        <div class="row">
            <aside class="col-sm-5 border-right">
                <article class="gallery-wrap">
                    <div class="img-big-wrap">
                        <div class="mt-5">
                            <img class="img-fluid mt-5" src="{{ asset('storage/images/PC-HP.png') }}">
                         </div>
                    </div>
                </article>
          </aside>
          <aside class="col-sm-7">
              <article class="card-body p-5">
                <h3 class="title mb-3">{{ $product->title }}</h3>

              <p class="price-detail-wrap">
                  <span class="price h3 text-dark">
                      <span class="currency">$</span><span class="num">{{ $product->price }}</span>
                  </span>
              </p>
              <dl class="item-property">
                  <dt>Description</dt>
                  <dd>
                      <p>{{ $product->description }}</p>
                  </dd>
              </dl>

             <hr>
             <form action="{{ route('cart.store') }}" method="post">

              <div class="row">
                  <div class="col-sm-5">
                      <dl class="param param-inline">
                          <dt>Quantity: </dt>
                          <dd>
                              <select name="qty"class="form-control form-control-sm" style="width:70px;">
                                  <option value="1"> 1 </option>
                                  <option value="2"> 2 </option>
                                  <option value="3"> 3 </option>
                              </select>
                          </dd>
                      </dl>
                  </div>
              </div>

                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="title" value="{{ $product->title }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <button type="submit" class="btn btn-lg  btn-outline-primary">Add to Cart</button>
              </form>
            </article>
          </aside>
      </div>
  </div>
</div>

@include('partials._footer',['check'=> false])

