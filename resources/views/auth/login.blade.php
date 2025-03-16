
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="apple-touch-icon" sizes="76x76" href="/dist/assets/img/wattpad.png">
      <link rel="icon" type="image/png" href="/dist/assets/img/wattpad.png">
      <title>
         Login-Laundry
      </title>
      <link rel="canonical" href="https://www.creative-tim.com/product/argon-dashboard-pro" />
      <meta name="keywords" content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap 5 dashboard, bootstrap 5, css3 dashboard, bootstrap 5 admin, Argon Dashboard bootstrap 5 dashboard, frontend, responsive bootstrap 5 dashboard, soft design, soft dashboard bootstrap 5 dashboard">
      <meta name="description" content="Argon Dashboard PRO is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">
      <meta name="twitter:card" content="product">
      <meta name="twitter:site" content="@creativetim">
      <meta name="twitter:title" content="Argon Dashboard PRO by Creative Tim">
      <meta name="twitter:description" content="Argon Dashboard PRO is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">
      <meta name="twitter:creator" content="@creativetim">
      <meta name="twitter:image" content="https://s3.amazonaws.com/creativetim_bucket/products/137/original/argon-dashboard-pro.jpg">
      <meta property="fb:app_id" content="655968634437471">
      <meta property="og:title" content="Argon Dashboard PRO by Creative Tim" />
      <meta property="og:type" content="article" />
      <meta property="og:url" content="https://demos.creative-tim.com/argon-dashboard-pro/pages/dashboards/landing" />
      <meta property="og:image" content="https://s3.amazonaws.com/creativetim_bucket/products/137/original/argon-dashboard-pro.jpg" />
      <meta property="og:description" content="Argon Dashboard PRO is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you." />
      <meta property="og:site_name" content="Creative Tim" />
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
      <link href="/dist/assets/css/nucleo-icons.css" rel="stylesheet" />
      <link href="/dist/assets/css/nucleo-svg.css" rel="stylesheet" />
      <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
      <link href="/dist/assets/css/nucleo-svg.css" rel="stylesheet" />
      <link id="pagestyle" href="/dist/assets/css/argon-dashboard.min.css?v=2.0.5" rel="stylesheet" />
   </head>
   <body class>
      <main class="main-content main-content-bg mt-0">
         <div class="page-header min-vh-100" style="background-image: url('/dist/assets/img/profile-layout-header.jpg');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
               <div class="row justify-content-center">
                  <div class="col-lg-4 col-md-7">
                     <div class="card border-0 mb-0">
                        <div class="card-header bg-transparent">
                           <h5 class="text-dark text-center mt-2 mb-3">Sign in</h5>
                        </div>
                        <div class="card-body px-lg-5 pt-0">
                           <form method="POST" action="{{ route('login') }}">
                            @csrf
                              <div class="mb-3">
                                 <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                                 @error('email')
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                              </div>
                              <div class="mb-3">
                                 <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                 @error('password')
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                              </div>
                              <div class="form-check form-switch">
                                 <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                 <label class="form-check-label" for="rememberMe">Remember me</label>
                              </div>
                              <div class="text-center">
                                 <button type="submit" class="btn btn-primary w-100 my-4 mb-2">Sign in</button>
                              </div>
                              <div class="mb-2 position-relative text-center">
                                 <p class="text-sm font-weight-bold mb-2 text-secondary text-border d-inline z-index-2 bg-white px-3">
                                    or
                                 </p>
                              </div>
                              <div class="text-center">
                                 <a class="btn bg-gradient-dark w-100 mt-2 mb-4" href="/register">Sign up</a>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </main>
      <script src="/dist/assets/js/core/popper.min.js"></script>
      <script src="/dist/assets/js/core/bootstrap.min.js"></script>
      <script src="/dist/assets/js/plugins/perfect-scrollbar.min.js"></script>
      <script src="/dist/assets/js/plugins/smooth-scrollbar.min.js"></script>
      <script src="/dist/assets/js/plugins/dragula/dragula.min.js"></script>
      <script src="/dist/assets/js/plugins/jkanban/jkanban.js"></script>
      <script>
         var win = navigator.platform.indexOf('Win') > -1;
         if (win && document.querySelector('#sidenav-scrollbar')) {
           var options = {
             damping: '0.5'
           }
           Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
         }
      </script>
      <script async defer src="https://buttons.github.io/buttons.js"></script>
      <script src="/dist//assets/js/argon-dashboard.min.js?v=2.0.5"></script>
      <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"8ace322848263dd4","serverTiming":{"name":{"cfL4":true}},"version":"2024.7.0","token":"1b7cbb72744b40c580f8633c6b62637e"}' crossorigin="anonymous"></script>
   </body>
</html>
