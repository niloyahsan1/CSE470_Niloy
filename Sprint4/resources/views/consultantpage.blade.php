<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/consultantpage.css') }}">
    <title>Consultant Dashboard</title>
</head>

<body>
    <h1>Customer Messages</h1>
    <br>

    @if (session('success'))
        <div style="color: green; margin-bottom: 10px;">{{ session('success') }}</div>
    @endif

    <table>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
            <th>Reply</th>
            <th>Action</th>
        </tr>

        @forelse ($appointments as $appointment)
            <tr>
                <td>{{ $appointment->c_no }}</td>
                <td>{{ $appointment->full_name }}</td>
                <td>{{ $appointment->email }}</td>
                <td>{{ $appointment->phn }}</td>
                <td>{{ $appointment->msg }}</td>
                <td>
                    <form action="{{ route('consultant.reply', $appointment->c_no) }}" method="post">
                        @csrf
                        <textarea name="consultant_reply" rows="2" style="width:200px;">{{ $appointment->consultant_reply ?? '' }}</textarea>
                        <button type="submit">Save Reply</button>
                    </form>
                </td>
                <td>
                    @if ($appointment->consultant_reply)
                        <span style="color: green;">Replied</span>
                    @else
                        <span style="color: orange;">Pending</span>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7">No messages yet.</td>
            </tr>
        @endforelse
    </table>
</body>

</html>
