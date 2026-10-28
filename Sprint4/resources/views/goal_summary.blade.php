<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/goaldone.css') }}">
    <title>Your Goal</title>
</head>

<body>
    @include('homebt')
    
    <main>
        <section>
            <h1>Your Goal</h1> <br>
            <h2>{{ $goal }} weight</h2>
        </section>

        <section>
            <h1>Your BMI</h1> <br>
            <h2>{{ $BMI }}</h2>
            <h2>{{ $show }}</h2>
        </section>
    </main>
    <main1>
        <section1>
            @php
            if ($do == "Nothing") {
                echo "";
            } elseif ($do != $goal) {
                $comment = "$do";
                echo "<p>Comments: </p>" . "<p> According to your height and weight your BMI is $BMI. 
                        So, your Goal should be $comment. But according to your Goal, 
                        you want to $goal your weight. If you want you 
                        can $goal your weight but we are 
                        suggesting you to $comment your weight. </p>";
            } else {
                echo "<p>Comments: </p>" . "";
            }
            @endphp

        </section1>
    </main1>


    <div class="btnnnn">
        <button type="submit" name="submit" onclick="window.location='{{ route('notungoal', ['age'=>$age, 'email'=>$email, 'goal'=>$goal, 'do'=>$do]) }}'">UPDATE GOAL</button>
    </div>
<br><br><br>

</body>

</html>