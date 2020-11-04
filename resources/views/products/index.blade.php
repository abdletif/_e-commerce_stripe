

  @include('partials._header')

  @include('partials._nav')

  <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <h1 class="my-4">All Product(s)</h1>
                <div class="list-group my-5">
                    <a href="#" class="list-group-item">Category 1</a>
                    <a href="#" class="list-group-item">Category 2</a>
                    <a href="#" class="list-group-item">Category 3</a>
                </div>
            </div>

            @include('partials._products',['links'=> 'true'])

        </div>
    </div>

  <!-- Footer -->
  @include('partials._footer',['check'=> false])

