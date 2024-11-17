<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
        }

        .resume-container {
            padding: 0.5em;
            width: 100%;

            >header {
                display: flex;
                justify-content: center;
            }

            >main {
                flex: 1;
                display: flex;
                gap: 0.5em;
                flex-wrap: wrap;
                justify-content: centera;

                >div {
                    min-width: 20em;
                    max-width: 40em;
                    flex: 1;
                    height: 20em;
                    display: flex;
                    flex-direction: column;
                    padding: 0.5em;
                    border-radius: 0.5em;
                    border: 1px solid green;
                    gap: 0.25em;

                    p,
                    h1 {
                        margin: 0;
                        padding: 0;
                    }

                    img {
                        height: 100px;
                        width: 100px;
                        align-self: center;
                    }
                }
            }
        }
    </style>
</head>

<body>
    @section('user', $user)
    @include('layouts.nav')
    <div class="resume-container">
        <header>
            <button id="add_resume">Add New Resume</button>
        </header>
        <main>
            @foreach ($resumes as $resume)
            <div>
                <h1>{{$resume->name}}</h1>
                <p>{{$resume->email}}</p>
                <p>{{$resume->contact}}</p>
                <img src="./images/{{ $resume->image }}" alt="{{ $resume->name }}" height="50">
                <button class="view_resume" data-id="{{$resume->id}}">View Resume</button>
                <button class="edit_resume" data-id="{{$resume->id}}">Edit Resume</button>
                <button class="delete_resume" data-id="{{$resume->id}}">Delete Resume</button>
            </div>
            @endforeach
        </main>

    </div>
    @include('layouts.modal')
    <script>
        document.querySelector('#add_resume').addEventListener('click', function() {
            window.location.href = '/add_resume';
        });
        document.querySelectorAll('.edit_resume').forEach(function(button) {
            button.addEventListener('click', function(e) {
                window.location.href = '/edit_resume/' + button.getAttribute('data-id');
            });
        });
        document.querySelectorAll('.view_resume').forEach(function(button) {
            button.addEventListener('click', function(e) {
                window.location.href = '/dashboard/' + button.getAttribute('data-id');
            });
        });
        document.querySelectorAll('.delete_resume').forEach(function(button) {
            button.addEventListener('click', function(e) {
                const modal = document.querySelector('.modal');
                modal.innerHTML = `
                    <div>
                        <p>Are you sure you want to delete this resume?</p>
                        <button id="yes" data-id="${button.getAttribute('data-id')}">Yes</button>
                        <button id="no">No</button>
                    </div>
                    `;
                modal.style.display = 'block';

                document.querySelector('#yes').addEventListener('click', async function(e) {

                    await fetch('/dashboard/' + button.getAttribute('data-id'), {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    }).then(response => {
                        if (response.ok) {
                            window.location.reload();
                        } else {
                            alert('Failed to delete resume.');
                        }
                    });
                });
                document.querySelector('#no').addEventListener('click', function(e) {
                    const modal = document.querySelector('.modal');
                    modal.innerHTML = '';
                    modal.style.display = 'none';
                });
            });

        });
    </script>
</body>

</html>