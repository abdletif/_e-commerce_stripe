
@include('partials._header')
@include('partials._nav')

   <div class="container my-auto mx-auto">
      @if (session('success_message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <strong>{{ session('success_message') }}</strong>
        </div>
      @endif
      <a href="/">Continue to Shopping &larr;</a>
   </div>


@include('partials._footer',['check' => true])
