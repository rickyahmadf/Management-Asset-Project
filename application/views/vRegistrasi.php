<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login | Manajemen Aset</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">


</head>

<style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #141e30;
    background: -webkit-linear-gradient(to right, #243b55, #141e30);
    background: linear-gradient(to right, #243b55, #141e30);
    overflow: hidden;
}

.container {
    width: 100%;
    max-width: 400px;
    padding: 20px;
    position: relative;
    z-index: 2;
}

.login-box {
    position: relative;
    max-width: 400px;
    background: rgba(0, 0, 0, 0.75);
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0.5);
}

.login-box h2 {
    margin-bottom: 30px;
    color: #fff;
    text-align: center;
}

.login-box .user-box {
    position: relative;
}

.login-box .user-box input {
    width: 100%;
    padding: 10px 0;
    font-size: 16px;
    color: #fff;
    margin-bottom: 30px;
    border: none;
    border-bottom: 1px solid #fff;
    background: transparent;
    outline: none;
}

.login-box .user-box label {
    position: absolute;
    top: 0;
    left: 0;
    padding: 10px 0;
    font-size: 16px;
    color: #fff;
    pointer-events: none;
    transition: 0.5s;
}

.login-box .user-box input:focus ~ label,
.login-box .user-box input:valid ~ label {
    top: -20px;
    left: 0;
    color: #1abc9c;
    font-size: 12px;
}

.login-box button {
    position: relative;
    display: inline-block;
    padding: 10px 20px;
    color: #fff;
    font-size: 16px;
    text-decoration: none;
    text-transform: uppercase;
    overflow: hidden;
    transition: 0.5s;
    letter-spacing: 4px;
    margin-top: 40px;
    background: #1abc9c;
    border-radius: 5px;
}

.login-box button:hover {
    background: #16a085;
}

.login-box button span {
    position: absolute;
    display: block;
}

.login-box button span:nth-child(1) {
    top: 0;
    left: -100%;
    width: 100%;
    height: 2px;
    background: linear-gradient(90deg, transparent, #fff);
    animation: btn-anim1 1s linear infinite;
}

@keyframes btn-anim1 {
    0% {
        left: -100%;
    }
    50%, 100% {
        left: 100%;
    }
}

.login-box button span:nth-child(2) {
    top: -100%;
    right: 0;
    width: 2px;
    height: 100%;
    background: linear-gradient(180deg, transparent, #fff);
    animation: btn-anim2 1s linear infinite;
    animation-delay: 0.25s;
}

@keyframes btn-anim2 {
    0% {
        top: -100%;
    }
    50%, 100% {
        top: 100%;
    }
}

.login-box button span:nth-child(3) {
    bottom: 0;
    right: -100%;
    width: 100%;
    height: 2px;
    background: linear-gradient(270deg, transparent, #fff);
    animation: btn-anim3 1s linear infinite;
    animation-delay: 0.5s;
}

@keyframes btn-anim3 {
    0% {
        right: -100%;
    }
    50%, 100% {
        right: 100%;
    }
}

.login-box button span:nth-child(4) {
    bottom: -100%;
    left: 0;
    width: 2px;
    height: 100%;
    background: linear-gradient(360deg, transparent, #fff);
    animation: btn-anim4 1s linear infinite;
    animation-delay: 0.75s;
}

@keyframes btn-anim4 {
    0% {
        bottom: -100%;
    }
    50%, 100% {
        bottom: 100%;
    }
}

@keyframes backgroundAnimate {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

body {
    background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
    background-size: 400% 400%;
    animation: backgroundAnimate 15s ease infinite;
}

::selection {
    background: #1abc9c;
    color: #fff;
}

.cool-text {
    font-family: 'Arial', sans-serif; /* Mengatur jenis font */
    font-size: 44px; /* Mengatur ukuran font */
    font-weight: bold; /* Mengatur ketebalan font */
    color: #ccc; /* Mengatur warna teks */
    background: linear-gradient(90deg, #000, #000);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    padding: 10px; /* Mengatur jarak dalam teks */
    margin: 20px; /* Mengatur jarak luar teks */
    text-align: center; /* Mengatur teks agar berada di tengah */
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Menambahkan bayangan pada teks */
    border-radius: 10px; /* Membuat sudut melengkung */
    transition: transform 0.3s, color 0.3s; /* Menambahkan transisi */
}

.submit-button {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .submit-button button {
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab); /* Warna hijau */
            color: white;
            border: none;
            border-radius: 5px;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            background-size: 400% 400%;
            animation: backgroundAnimate 15s ease infinite;
            font-weight: bold;

        }

        a {
            text-decoration: none;
            color: white; /* Warna biru yang cerah */
            font-size: 16px;
            display: block;
            text-align: center;
            margin-top: 20px;
            
        }
        a:hover{
            color: #16a085;
        }
</style>

<body >
<div class="container">
 

  <div class="login-box">
    
      <h2>Register Page</h2>

      <form action="<?= base_url('admin/ckeloladata/createregistrasi') ?>" method="post">
        <div class="user-box">
          <input type="text" name="nama" required>
          <label>Nama</label>
        </div>

        <div class="user-box">
          <input type="text"  name="no_hp" placeholder="No Handphone" required>
          <label>No Handphone</label>
        </div>

        <div class="user-box">
          <input type="text"  name="status" placeholder="Status" required>
          <label>Status</label>
          
        </div>
        
        <div class="user-box">
          <input type="text"  name="username" placeholder="Username" required>
          <label>Username</label>
        </div>

        <div class="user-box">
                        <input type="password" name="password"  id="exampleInputEmail1" required>
          <label>Password</label>
         </div>

       
          <!-- /.col -->
          <div class="submit-button">
            <button type="submit" class="btn btn-primary btn-block ">Register</button>
          </div>
          <!-- /.col -->

          <a href="<?= base_url('cAuth') ?>" class="text-center"><center>Sudah punya akun</center></a>


        </div>
      </form>

      

   
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->



</body>

</html>
