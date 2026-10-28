<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/ddc.css') }}">
    <title>Appointment Form</title>
</head>

<body>
    <h1>Appointment Confirmation</h1>
    <br>

    <table>
        <tr>
            <th>c_no</th>
            <th>Email</th>
            <th>Message</th>
        </tr>
        <tr>
            <td>{{ $c_no }}</td>
            <td>{{ $email }}</td>
            <td>{{ $msg }}</td>
        </tr>
    </table>
</body>

</html>
