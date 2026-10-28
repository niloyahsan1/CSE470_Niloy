<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/consultantpage.css') }}">
    <title>Consultant</title>
</head>

<body>    
    <h1>Appointment Messages</h1>
    <br>
    
    <table>
        <tr>
            <th>c_no</th>
            <th>full_name</th>
            <th>msg</th>
            <th>Consultant's Reply</th>
            <th>Action</th>
        </tr>
    
        @foreach ($appointments as $appointment)
            <tr>
                <td>{{ $appointment->c_no }}</td>
                <td>{{ $appointment->full_name }}</td>
                <td>{{ $appointment->msg }}</td>
                <td>
                    <input type="text" name="consultant_reply[]" value="{{ $appointment->consultant_reply ?? '' }}">
                </td>
                <td>
                    <button type="button" onclick="updateReply({{ $appointment->c_no }})">Update</button>
                </td>
            </tr>
        @endforeach
    </table>
</body>

</html>
