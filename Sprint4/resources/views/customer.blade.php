<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Customer Home Page</title>
  <link rel="stylesheet" href="{{ asset('css/customer.css') }}">
</head>


<body>
  <nav>
    <h2 class="logo">Healthy Habits</h2>
    <div class="wrapper">
      <ul>
        <li><a href="{{ route('table') }}"><span>Daily Diet Chart</span></a></li>
        <li><a href="{{ route('dailyactivity') }}"><span>Daily Activities</span></a></li>
        <li><a href="{{ route('goaldekho') }}"><span>Goals</span></a></li>
        <li><a href="{{ route('showconsultantform') }}"><span>Consultant</span></a></li>
        <li><a href="{{ route('my.messages') }}"><span>My Messages</span></a></li>
        <li><a href="{{ route('profile_done') }}"><span>My Profile</span></a></li>
        <li><a href="{{ route('logout') }}"><span>Logout</span></a></li>
      </ul>
    </div>
  </nav>


  <h1>Eat Healthy, <br><span>Stay Healthy</span></h1>
  <p class="par"><br>Discover the power of healthy eating with our expert tips,<br> transform your health and wellness journey
    with our comprehensive<br>guide to healthy eating and lifestyle changes.</p>


</body>

</html>
