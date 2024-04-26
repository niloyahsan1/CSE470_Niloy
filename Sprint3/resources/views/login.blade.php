<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>


<body>

  <div class=form>
    <h2>Login</h2>
    <form class="" action="{{ route('loginauth') }}" method="post" autocomplete="off">
      @csrf
      <input type="text" name="email" id="email" placeholder="Enter Email Here">
      <input type="password" name="pass" id="pass" placeholder="Enter Password Here">
      <button type="submit" class="btnn" name="submit">Login</button>

      <p class="link">Not a User?<br>
        <a href="{{ route('signup-show') }}">Signup Here</a>
      </p>
      <p class="liw">Contact with us</p>

      <div class="icons">
        <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
        <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
        <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
        <a href="#"><ion-icon name="logo-google"></ion-icon></a>
        <a href="#"><ion-icon name="logo-skype"></ion-icon></a>
      </div>

    </form>
  </div>
  <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

</body>

</html>