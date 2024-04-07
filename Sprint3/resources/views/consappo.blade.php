<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/ddc.css') }}">
    <title>Appoinment Form</title>
</head>

<body>
    {{-- @include('homebt') --}}
    
    <h1>Appoinment Message</h1>
    <br>

    <table>
        <th>c_no</th>
        <th>full_name</th>
        <th>msg</th>

    @php
        $chat = App\Models\UserAppo::where('c_no', $c_no)->first();
    @endphp
    <tr>
        <td>{{ $chat->c_no }}</td>
        <td>{{ $chat->full_name }}</td>
        <td>{{ $chat->msg }}</td>
    </tr>

    </table>
</body>

</html>
