@include('la.layout.header')
<body id="page-top">
 @include('la.layout.navbar')
  <div id="wrapper">
    @include('la.layout.sidebar')

    @yield('content')
    {{-- End change content section --}}
  </div>
  @include('la.credential.logout')
  @include('la.layout.footer')