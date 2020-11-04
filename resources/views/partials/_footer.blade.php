
    <footer class="py-5 bg-dark @if($check )fixed-bottom @endif">
        <div class="container">
           <p class="m-0 text-center text-white">Copyright &copy; Store shop {{ now()->format('Y') }}</p>
        </div>
    </footer>
    <script src="{{ asset('js/app.js')}}"></script>

    {{-- <script src="{{ asset('js/jquery.min.js')}}"></script> --}}
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
  </body>

</html>

