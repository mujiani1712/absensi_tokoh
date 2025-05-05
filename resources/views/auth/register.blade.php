<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
    

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{--

    <form method="POST" action="{{ route('register.submit') }}">
        @csrf
        <label>Nama:</label><br>
        <input type="text" name="nama" value="{{ old('nama') }}"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email') }}"><br><br>

        <label>No Telp:</label><br>
        <input type="text" name="no_telp" value="{{ old('no_telp') }}"><br><br>

        <label>Username:</label><br>
        <input type="text" name="username" value="{{ old('username') }}"><br><br>

        <label>Password:</label><br>
        <input type="password" name="password"><br><br>

        <label>Konfirmasi Password:</label><br>
        <input type="password" name="password_confirmation"><br><br>

        <button type="submit">Daftar</button>
    </form>

    <p>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
    --}}

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="coll-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Form Registrasi Karyawan</h2> 
                        <strong>Register</strong>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{route('register.submit')}}">

                            @csrf
                            <div class="form-group">
                                <label for ="nama"> Nama</label>
                                <input type="text" class="form-control" name="nama"  value="{{ old('nama') }}">
                            </div>

                            <div class="form-group mt-2">
                                <label for ="text"> Email</label>
                                <input type="email" class="form-control" name="email" value="{{old('email')}}">
                            </div>

                            <div class="form-group mt-2">
                                <label for ="no_tlp"> Nomor Telpon</label>
                                <input type="text" class="form-control" name="no_telp" value="{{ old('no_telp') }}">

                            </div>

                            <div class="form-group  mt-2">
                                <label for =" username"> Username</label>
                                <input type="text" class="form-control" name="username" value="{{old('username')}}" >
                            </div>

                            <div class="form-group mt-2">
                                <label for =" password">  Password</label>
                                <input type="password" class="form-control" name=" password" value="{{old('password')}}">
                            </div>

                            <div class="form-group mt-2">
                                <label for ="password"> Konfirmasi Password</label>
                                <input type="password" class="form-control" name="password_confirmation">

                            </div>

                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn-primary btn-block">Daftar</button> <br>

                                <p>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
                                
                            </div>

                                

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>
</html>
