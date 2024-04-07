<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/da.css') }}">
    <title>Daily Activities</title>
</head>

<body>
    @include('homebt')

    <h1>Daily Activity Table For BMI : {{ $BMI }} <br> BMI Type : {{ $show }}</h1>
    <br>
    <br>
    <table>
        <th>Activity Type</th>
        <th>Duration</th>
        <th>Frequency</th>
        <th>Intensity</th>

        @foreach ($activityTableData as $info)
            <tr>
                <td>{{ $info->Activity_Type }}</td>
                <td>{{ $info->Duration }}</td>
                <td>{{ $info->Frequency }}</td>
                <td>{{ $info->Intensity }}</td>
            </tr>
        @endforeach

    </table>
</body>

</html>