<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>


<body>
    <h2>Update Your Profile</h2>
    <div class="container">
        <form class="" action="{{ route('profile_update',['email'=>$email]) }}" method="post">
            @csrf
            <label for="age">Select Your Age : </label>
            <select name="age" id="age">
                <option>>--Select--<</option>
                <option value="10 - 16">10 - 16</option>
                <option value="17 - 20">17 - 20</option>
                <option value="21 - 26">21 - 26</option>
                <option value="27 - 35">27 - 35</option>
                <option value="36 - 45">36 - 45</option>
                <option value="46 - 55">46 - 55</option>
                <option value="56 - 70">56 - 70</option>
            </select> <br>

            <label for="gender">Select Your Gender : </label>
            <select name="gender" id="gender">
                <option>>--Select--<</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select> <br>

            <label for="height">Enter Your Current Height : </label>
            <input type="text" name="height" id="height" required value=""> <label for="inch">inch</label> <br>

            <label for="current_weight"> Enter Your Current Weight : </label>
            <input type="text" name="current_weight" id="current_weight" required value=""> <label for="kg">kg</label> <br>

            <br><button type="submit" name="submit">Confirm</button>

        </form>
    </div>
</body>

</html>