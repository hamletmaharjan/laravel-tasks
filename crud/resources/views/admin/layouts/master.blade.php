@include('admin.layouts.header')

@include('admin.layouts.navbar')

@include('admin.layouts.sidebar')


    
      
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
        <!-- content-wrapper ends -->
        

@include('admin.layouts.footer')