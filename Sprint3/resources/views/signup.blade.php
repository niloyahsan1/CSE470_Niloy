<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Signup</title>
  <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
</head>


<body>
  <div class="charkona">
    <h2>Signup Here</h2>
    <form class="" action="{{ route('usersignup') }}" method="post" autocomplete="off">
      @csrf
      <input type="text" name="fname" id="fname" required value="" placeholder="Enter Your First Name">
      <input type="text" name="lname" id="lname" placeholder="Enter Your Last Name"> 
      <input type="text" name="username" id="username" required value="" placeholder="Create Your Username"> 
      <input type="email" name="email" id="email" required value="" placeholder="Enter Your Email">
      <br><br>
      <div class="optt">
        <select name="ptype" id="ptype">
          <option>--Select Your Profile Type--</option>
          <option value="Customer">Customer</option>
          <option value="Consultant">Consultant</option>
        </select>
      </div>
      
      <input type="password" name="pass" id="pass" required value="" placeholder="Create Your Password"> 
      <button type="submit" class="bttn" name="submit">Signup</button>
    </form>

    <p class="login">Already Have an Account?<br>
      <a href="{{ route('loginauth') }}">Login Here</a>
    </p>

  </div>


  <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

</body>
</html>