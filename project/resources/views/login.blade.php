<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="{{asset('/img/favicon.ico')}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="{{ asset('css/style.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <!-- IMAGE CONTAINER BEGIN -->
        <div class="col-lg-6 col-md-6 d-none d-md-block infinity-image-container">
          <div class="slider"></div>
        </div>
        <!-- IMAGE CONTAINER END -->

        <!-- FORM CONTAINER BEGIN -->
        <div class="col-lg-6 col-md-6 infinity-form-container">
          <div class="col-lg-9 col-md-12 col-sm-9 col-xs-12 infinity-form">
            <div class="text-center mb-4">
              <h4>Masuk</h4>
            </div>
            <!-- Form -->
            <form action="{{ url('/') }}/auth" method="POST" class="px-3">
              @csrf
              <!-- Input Box -->
              <div class="form-input">
                <span><i class="fa fa-user"></i></span>
                <input type="text" name="username" placeholder="Username" tabindex="10" required />
              </div>
              <div class="form-input">
                <span><i class="fa fa-lock"></i></span>
                <input type="password" name="password" placeholder="Password" required />
              </div>

              <!-- Login Button -->
              <div class="mb-3">
                <button type="submit" class="btn btn-block">Login</button>
              </div>
            </form>
          </div>
        </div>
        <!-- FORM CONTAINER END -->
      </div>
    </div>
  </body>
</html>
