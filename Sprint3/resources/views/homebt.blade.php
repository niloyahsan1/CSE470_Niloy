<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Back to home</title>
</head>
<body>

    <nav>
        <h2 class="logo">Healthy Habits</h2>
        <div class="wrapper">
            <ul>
                <li><a href="{{ route('table',['age'=>$age, 'email'=>$email, 'weight'=>$goal]) }}"><span>Daily Diet Chart</span></a></li>
                <li><a href="{{ route('dailyactivity',['age'=>$age, 'email'=>$email, 'weight'=>$goal]) }}"><span>Daily Activities</span></a></li>
                <li><a href="{{ route('goaldekho', ['age'=>$age, 'email'=>$email, 'weight'=>$goal]) }}"><span>Goals</span></a></li>
                <li><a href="{{ route('showconsultantform', ['age'=>$age, 'email'=>$email, 'weight'=>$goal]) }}"><span>Consultant</span></a></li>
                <li><a href="{{ route('profile_done', ['age'=>$age, 'email'=>$email, 'weight'=>$goal]) }}"><span>My Profile</span></a></li>
                <li><a href="{{ route('home', ['age'=>$age, 'email'=>$email, 'goal'=>$goal]) }}"><span>HOME</span></a></li>
            </ul>
        </div>
    </nav>

</body>
</html>


<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.8)50%, rgba(0, 0, 0, 0.8)50%);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding-left: 20px;
    padding-right: 15px;
    padding-top: 15px;
    padding-bottom: 10px;
}

.logo {
    font-size: 2rem;
    font-weight: bold;
    color: #ff7200;
    font-family: 'Times New Roman', Times, serif;
}

.logo:hover {
    font-size: 2rem;
    /* text-decoration: underline; */
    color: #ffa200;
    font-family: 'Times New Roman', Times, serif;
}

nav ul {
    display: flex;
    list-style: none;
}

nav ul li {
    margin-left: 1rem;
}

nav ul li a {
    text-decoration: none;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-family: 'Times New Roman', Times, serif;
    transition: all 0.2s ease-in-out;
}


.wrapper a {
    display: block;
    width: 150px;
    height: 35px;
    font-size: 14.5px;
    font-family: 'Times New Roman', Times, serif;
    text-decoration: none;
    color: #ff7200;
    border: 2px solid #ff7200;
    letter-spacing: 1px;
    text-align: center;
    position: relative;
    transition: all .35s;
}

.wrapper a span {
    position: relative;
    z-index: 2;
}

.wrapper a:after {
    border-radius: 20px;
    position: absolute;
    content: "";
    top: 0;
    left: 0;
    width: 0;
    height: 100%;
    background: #ff7200;
    transition: all .35s;
}

.wrapper a:hover {
    color: #fff;
}

.wrapper a:hover:after {
    width: 100%;
}

</style>