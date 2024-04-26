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
    <h1>Appoinment Message</h1>
    <br>
    
    <table>
        <tr>
            <th>c_no</th>
            <th>full_name</th>
            <th>msg</th>
            <th>Consultant's Reply</th>
            <th>Action</th>
        </tr>
    
        @php
            $chat = App\Models\UserAppo::all();
        @endphp
    
        @foreach ($chat as $chat)
            <tr>
                <td>{{ $chat->c_no }}</td>
                <td>{{ $chat->full_name }}</td>
                <td>{{ $chat->msg }}</td>
                <td>
                    <input type="text" name="consultant_reply[]" value="{{ $chat->consultant_reply ?? '' }}">
                </td>
                <td>
                    <button type="button" onclick="updateReply({{ $chat->c_no }})">Update</button>
                </td>
            </tr>
        @endforeach
    </table>
    

    </table>
</body>

</html>
