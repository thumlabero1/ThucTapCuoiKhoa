<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.head')
</head>
<body class="bg-dark">
  <div class="container-fluid">
    @include('admin.alert')
    <div class="row d-md-flex">
      <div class="col-md-3 bg-dark">
        @include('admin.sidebar')
      </div>
      <div class="col-md-9">
        <div class="main-content p-3">
          @yield('content')
        </div>
      </div>
    </div>
  </div>
</body>
</html>