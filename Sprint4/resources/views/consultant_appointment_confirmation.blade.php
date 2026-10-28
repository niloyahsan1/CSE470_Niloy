<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Confirmation</title>
</head>

<body>
@include('homebt')

    <h1>Appointment Sent</h1>
    <br>

    <p>Your message has been sent to the consultant. Your reference number is: <strong>{{ $appointment->c_no }}</strong></p>
    <p>You can view the reply from your consultant on the
        <a href="{{ route('my.messages') }}">My Messages</a> page.
    </p>

    <table>
        <tr>
            <th>Ref #</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
        </tr>
        <tr>
            <td>{{ $appointment->c_no }}</td>
            <td>{{ $appointment->email }}</td>
            <td>{{ $appointment->phn }}</td>
            <td>{{ $appointment->msg }}</td>
        </tr>
    </table>
</body>

</html>
