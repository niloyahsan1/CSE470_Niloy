<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/consultant.css') }}">
    <title>Appoinment</title>
</head>

<body>
@include('homebt')

    <h2>Appoinment Form</h2>
    <div class="container">
        <form class="" action="{{ route('appo') }}" method="post" autocomplete="off">
          @csrf
            <label for="full_name">Enter Your Full Name</label>
            <input type="text" name="full_name" id="full_name" required value=""> <br><br>
            <label for="email">Enter Your Email</label>
            <input type="text" name="email" id="email" required value=""> <br><br>
            <label for="phn">Enter Your Phone No</label>
            <input type="text" name="phn" id="phn" required value=""> <br><br>
            <label for="msg">Enter Massage:</label>
            <input type="text" name="msg" id="msg" required value=""> <br><br>
            <button type="submit" name="submit">Done</button>

        </form>
    </div>
</body>

</html>