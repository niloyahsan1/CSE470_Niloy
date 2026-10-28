<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/ddc.css') }}">
    <title>Daily Diet Chart</title>
</head>

<body>
    @include('homebt')
    
    <h1>Diet Table For {{ $goal }} Weight. <br> Age : {{ $age }} </h1>
    <br>
    <br>
    
    <table>
        <th>Food Items</th>
        <th>Breakfast</th>
        <th>Lunch</th>
        <th>Dinner</th>
        <th>Total Calories</th>

        @foreach ($dietTableData as $info)
            <tr>
                <td>{{ $info->Food_Items }}</td>
                <td>{{ $info->Breakfast }}</td>
                <td>{{ $info->Lunch }}</td>
                <td>{{ $info->Dinner }}</td>
                <td>{{ $info->Total_Calories}}</td>
            </tr>
        @endforeach

    </table>
</body>

</html>
