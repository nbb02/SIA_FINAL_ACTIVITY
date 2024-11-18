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
                justify-content: center;
            }

            p {
                margin: 0;
            }
        }


        .resume-cards {
            padding: 2em;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            position: relative;
            width: 25em;
            height: 17em;
            transition: all 0.5s;

            img {
                height: 6em;
                width: 6em;
                border-radius: 1em;
                box-shadow: 20px 20px 50px -21px rgba(158, 158, 158, 1);
                z-index: 2;
                position: absolute;
                left: 50%;
                top: 2em;
                transform: translate(-50%, 0);
                background-color: white;
                transition: all 0.5s;
            }

            > div {
                box-shadow: 20px 20px 50px -21px rgba(158, 158, 158, 1);
                border: 1px solid black;
                padding: 1em;
                border-radius: 1em;
                padding-top: 5em;
                text-align: center;
                height: 10em;
                overflow: hidden !important;
                transition: all 0.5s;
                display: flex;
                flex-direction: column;
                gap: 0.5em;

                > p:first-of-type {
                    font-weight: bold;
                    font-size: 1.2em;
                }
                > footer {
                    display: flex;
                    gap: 0.5em;

                    > button {
                        flex: 1;
                        padding: 0.25em 0.5em;
                    }
                }
            }

            &:hover {
                height: 22em;
                img {
                    height: 8em;
                    width: 8em;
                }

                > div {
                    padding-top: 7em;
                    height: 15em;
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
            <div class="resume-cards">
                <img src="./images/{{ $resume->image }}" alt="{{ $resume->name }}" height="50">
                <div>
                    <p>{{$resume->name}}</p>
                    <p>{{$resume->email}}</p>
                    <p>{{$resume->contact}}</p>
                    <footer>
                        <button class="delete_resume" data-id="{{$resume->id}}">Delete</button>
                        <button class="view_resume" data-id="{{$resume->id}}">View</button>
                    </footer>
                </div>
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