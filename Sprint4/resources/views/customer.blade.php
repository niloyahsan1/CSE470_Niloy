<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Customer Home Page</title>
  <link rel="stylesheet" href="{{ asset('css/customer.css') }}">
</head>


<body>
  {{-- {{ $email }} --}}
  <nav>
    <h2 class="logo">Healthy Habits</h2>
    <div class="wrapper">
      <ul>
        <li><a href="{{ route('table',['age'=>$age, 'email'=>$email, 'weight'=>$goal]) }}"><span>Daily Diet Chart</span></a></li>
        <li><a href="{{ route('dailyactivity',['age'=>$age, 'email'=>$email, 'weight'=>$goal]) }}"><span>Daily Activities</span></a></li>
        <li><a href="{{ route('goaldekho', ['age'=>$age, 'email'=>$email, 'weight'=>$goal]) }}"><span>Goals</span></a></li>
        <li><a href="{{ route('showconsultantform', ['age'=>$age, 'email'=>$email, 'weight'=>$goal]) }}"><span>Consultant</span></a></li>
        <li><a href="{{ route('profile_done', ['age'=>$age, 'email'=>$email, 'weight'=>$goal]) }}"><span>My Profile</span></a></li>
        <li><a href="{{ route('logout') }}"><span>Logout</span></a></li>
      </ul>
    </div>
  </nav>


  <h1>Eat Healthy, <br><span>Stay Healthy</span></h1>
  <p class="par"><br>Discover the power of healthy eating with our expert tips,<br> transform your health and wellness journey
    with our comprehensive<br>guide to healthy eating and lifestyle changes.</p>


</body>

</html>