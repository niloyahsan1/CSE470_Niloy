<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Goal</title>
    <link rel="stylesheet" href="{{ asset('css/goal.css') }}">
</head>


<body>
    {{ $email }}
    <h2>Set Your Goal</h2>
    <div class="container">
        <form class="" action="{{ route('goal.set',['email'=>$email,'age'=>$age]) }}" method="post" autocomplete="off">
            @csrf
            <label for="weight">Choose Whether You Increase or Decrease Weight: </label>
            <select name="weight" id="weight">
                <option>>--Select--<</option>
                <option value="Increase">Increase</option>
                <option value="Decrease">Decrease</option>
            </select>

            <br><button type="submit" name="submit">Done</button>
        </form>
    </div>

</body>

</html>