<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lead Status Updated</title>
</head>
<body>
    <h3>Lead Status Updated</h3>

    <p>Hello,</p>

    <p>The status of the following lead has been updated:</p>

    <ul>
        <li><strong>Name:</strong> {{ $lead->name }}</li>
        <li><strong>Email:</strong> {{ $lead->email }}</li>
        <li><strong>Phone:</strong> {{ $lead->phone }}</li>
        <li><strong>Status:</strong> {{ $lead->status }}</li>
    </ul>

    <p>Updated at: {{ now() }}</p>

    <p>Regards,<br>{{ config('app.name') }}</p>
</body>
</html>
