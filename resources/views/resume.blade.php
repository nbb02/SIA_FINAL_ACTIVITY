<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="resume">
        <h1>{{ $name }}</h1>
        <img src="/images/{{ $image }}" alt="Profile Picture" height="50">
        <p><strong>Birthday:</strong> {{ $birthday }}</p>
        <p><strong>Contact:</strong> {{ $contact }}</p>
        <p><strong>Email:</strong> {{ $email }}</p>
        <p><strong>Address:</strong> {{ $address }}</p>

        <h2>Education</h2>
        <h3>College</h3>
        @foreach ($education['college'] as $college)
        <p><strong>Name:</strong> {{ $college['name'] }}</p>
        <p><strong>Course:</strong> {{ $college['course'] }}</p>
        <p><strong>Location:</strong> {{ $college['location'] }}</p>
        <p><strong>Date Graduated:</strong> {{ $college['date_graduated'] }}</p>
        @endforeach

        <h3>Elementary</h3>
        @foreach ($education['elementary'] as $elementary)
        <p><strong>Name:</strong> {{ $elementary['name'] }}</p>
        <p><strong>Course:</strong> {{ $elementary['course'] }}</p>
        <p><strong>Location:</strong> {{ $elementary['location'] }}</p>
        <p><strong>Date Graduated:</strong> {{ $elementary['date_graduated'] }}</p>
        @endforeach

        <h2>Skills</h2>
        <ul>
            @foreach ($skills as $skill)
            <li>{{ $skill }}</li>
            @endforeach
        </ul>
    </div>
</body>

</html>