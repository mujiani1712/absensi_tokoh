

<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Login Karyawan</title>
</head>
<body>
    
    
    @if(session('success'))
    
    <div style="color: green;">{{ session('success') }}</div>
 
       {{--
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Sukses</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      --}}
@endif




<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header text-center">
                    <strong>Login</strong>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login.submit') }}">
                        @csrf
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="username" class="form-control" name="username" required autofocus>
                        </div>

                        <div class="form-group mt-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary btn-block">Login</button> <br>
                            
                            <p>Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- script bostap -->

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>







</body>
</html>










  {{--- 

<!DOCTYPE html>
<html>
<head>
    <title>Login Karyawan</title>
</head>
<body>
    <h2>Login Karyawan</h2>
    @if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

        {{--- 
    <form method="POST" action="{{ route('login.submit') }}">
        @csrf
       
    
        <label>Username:</label><br>
        <input type="text" name="username"><br><br>
    
        <label>Password:</label><br>
        <input type="password" name="password"><br><br>
        <button type="submit">Login</button> <br>
  
      

    
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header text-center">
                            <strong>Login</strong>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login.submit') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" required autofocus>
                                </div>
        
                                <div class="form-group mt-3">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>
        
                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-primary btn-block">Login</button> 
                                
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        



        

       <!---



        <div class="section mt-1 mb-5">
            <form action="app-pages.html">
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <input type="text" name="username"><br><br>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <input type="password" name="password"><br><br>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="form-links mt-2">
                    <div>
                        <a href="page-register.html">Register Now</a>
                    </div>
                    <div><a href="page-forgot-password.html" class="text-muted">Forgot Password?</a></div>
                </div>

                <div class="form-button-group">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Log in</button>
                </div>

            </form>
        </div>
            --->



        <p>Belum punya akun? <a href="{{ route('register') }}">Buat akun di sini</a></p>
    </form>
</body>
</html>
  --}}
