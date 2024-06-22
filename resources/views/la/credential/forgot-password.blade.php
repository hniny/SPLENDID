@include('la.layout.header')
<body class="bg-dark">
 <div class="card card-login mx-auto mt-5">
    <div class="card-header">Reset Password</div>
    <div class="card-body">
      <div class="text-center mb-4">
        <h4>Forgot your password?</h4>
        <p>Enter your email address and we will send you instructions on how to reset your password.</p>
      </div>
      <form action="/login" method="get">
        <div class="form-group">
          <div class="form-label-group">
            <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Enter email address" required="required" autofocus="autofocus">
            <label for="inputEmail">Enter email address</label>
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
      </form>
      <div class="text-center">
        <a class="d-block small mt-3" href="/register">Register an Account</a>
        <a class="d-block small" href="/login">Login Page</a>
      </div>
    </div>
  </div>

  @include('la.layout.footer')