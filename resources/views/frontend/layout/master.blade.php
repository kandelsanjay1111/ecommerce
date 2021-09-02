
<!DOCTYPE html>
<html lang="en">
@include('frontend.layout.head')
  <body> 
@include('frontend.layout.loader')


@include('frontend.layout.header')
@include('frontend.layout.menu')

@yield('content')

@include('frontend.layout.footer')

@include('frontend.layout.modal')  

@include('frontend.layout.script')

@yield('script')

  </body>
</html>