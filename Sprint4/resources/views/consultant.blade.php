<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/consultant.css') }}">
    <title>Book Appointment</title>
</head>

<body>
@include('homebt')

    <h2>Appointment Form</h2>
    <div class="container">
        @if ($errors->any())
            <div style="color: red; margin-bottom: 10px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('appo') }}" method="post" autocomplete="off">
            @csrf
            <label for="full_name">Enter Your Full Name</label>
            <input type="text" name="full_name" id="full_name" required value="{{ old('full_name') }}"> <br><br>

            <label for="email">Your Email</label>
            <input type="email" name="email" id="email" required value="{{ old('email', $email ?? '') }}"> <br><br>

            <label for="phn">Enter Your Phone No</label>
            <input type="text" name="phn" id="phn" required value="{{ old('phn') }}"> <br><br>

            <label for="msg">Enter Message:</label>
            <textarea name="msg" id="msg" rows="4" required>{{ old('msg') }}</textarea> <br><br>

            <button type="submit" name="submit">Send Message</button>
        </form>
    </div>
</body>

</html>
