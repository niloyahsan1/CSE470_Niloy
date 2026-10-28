<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Messages</title>
</head>

<body>
@include('homebt')

    <h1>My Consultant Messages</h1>
    <br>

    <table>
        <tr>
            <th>Ref #</th>
            <th>Message</th>
            <th>Consultant Reply</th>
            <th>Status</th>
        </tr>

        @forelse ($messages as $message)
            <tr>
                <td>{{ $message->c_no }}</td>
                <td>{{ $message->msg }}</td>
                <td>
                    @if ($message->consultant_reply)
                        {{ $message->consultant_reply }}
                    @else
                        <em>Awaiting reply...</em>
                    @endif
                </td>
                <td>
                    @if ($message->consultant_reply)
                        <span style="color: green;">Replied</span>
                    @else
                        <span style="color: orange;">Pending</span>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">You have not sent any messages yet.
                    <a href="{{ route('showconsultantform') }}">Contact a Consultant</a>
                </td>
            </tr>
        @endforelse
    </table>
</body>

</html>

