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
    <form method="POST" action="{{ route('login.submit') }}">

 

        @csrf
       
        <label>Username:</label><br>
        <input type="text" name="username"><br><br>
    
        <label>Password:</label><br>
        <input type="password" name="password"><br><br>
        <button type="submit">Login</button> <br>
     

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
