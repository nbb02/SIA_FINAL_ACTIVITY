<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Geist:wght@100..900&family=Niramit:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&family=Pixelify+Sans:wght@400..700&display=swap');

        * {
            box-sizing: border-box;
            font-family: "Niramit", sans-serif;
            color: var(--text)
        }

        body {
            background-color: var(--background);
            padding: 0;
            margin: 0;
        }

        main {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            align-content: space-around;
            gap: 3em;
            padding: 0 2em 2em 2em;
            margin-top: 1em;
        }

        .dashboard-counts {
            display: flex;
            justify-content: center;
            gap: 3em;
            flex-wrap: wrap;
            margin-top: 2em;
        }

        .card-container {
            position: relative;
            background-color: var(--secondary);
            border-radius: 2rem;
            box-shadow: 0px 10px 20px -10px rgba(0, 0, 0, 0.75);
            color: #B3B8CD;
            padding: 0 2rem;
            padding-top: 30px;

            width: 350px;
            height: 300px;
            max-width: 100%;
            text-align: center;
            overflow-y: hidden;

            transition: all 0.18s ease-in-out;

            p, h4, h2 {
                margin: 0;

            }
        }

        .card-container:hover {
            background-color: var(--accent);
            height: auto;
            padding-bottom: 30px;

            border: 5px solid transparent;

            transform: scale(1.15) translateZ(0);
            animation: rainbow 5s linear infinite;
        }

        .resume-container:has(.card-container:hover) .card-container:not(:hover) {
            transform: scale(0.9);
            filter: blur(5px) brightness(80%);
        }

        .card-container .round {
            display: block;
            border: 1px solid var(--text);
            border-radius: 50%;
            padding: 7px;
            object-fit: contain;
            height: 150px;
            width: 150px;
            margin: auto;
        }

        .skills {
            text-align: left;
            padding: 1rem;

            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
            }

            li {
                border: 2px solid #2D2747;
                border-radius: 0.5rem;
                display: inline-block;
                font-size: 1rem;
                font-weight: 700;
                margin: 0 7px 7px 0;
                padding: 0.5rem;
            }
        }

        .buttons {
            display: flex;
            justify-content: space-around;
            align-items: center;
            height: 3rem;
        }

        .buttons .primary {
            background-color: var(--secondary);
            border: none;
            border-radius: 0.5rem;
            color: var(--text);
            font-family: Montserrat, sans-serif;
            font-weight: 500;
            padding: 10px 25px;
            cursor: pointer;
            box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.75);

            transition: all 0.18s ease-in-out;
        }

        .buttons .primary:hover {
            background-color: var(--text);
            color: var(--secondary);
            box-shadow: 0px 15px 9px -8px rgba(0, 0, 0, 0.75);

            padding: 12px 30px;
            margin-bottom: 0.3rem;
        }

        .buttons .primary.ghost {
            background-color: var(--primary);
            color: var(--text);
        }

        .buttons .primary.ghost:hover {
            background-color: var(--text);
            color: var(--primary);
        }

        .confirmation_card {
            width: 300px;
            height: fit-content;
            background: var(--accent);
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 20px;
            padding: 30px;
            position: relative;
            box-shadow: 20px 20px 30px rgba(0, 0, 0, 0.068);
        }

        .card-content {
            width: 100%;
            height: fit-content;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .card-heading {
            font-size: 20px;
            font-weight: 700;
            color: var(--text);
        }

        .card-description {
            font-weight: 400;
            color: var(--text);
        }

        .card-button-wrapper {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .card-button {
            width: 50%;
            height: 35px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            font-weight: 600;
        }

        .primary {
            background-color: var(--primary);
            color: var(--text);
        }

        .primary:hover {
            background-color: var(--text);
            color: var(--primary);
        }

        .secondary {
            background-color: var(--secondary);

        }

        .secondary:hover {
            background-color: var(--text);
            color: var(--primary);
        }

        .change_theme {
                background-color: transparent;
                padding: 0.5em 0.75em;
                border: 2px solid #38d39f;
                color: #32be8f;
                font-weight: 500;
                border-radius: 0.5em;
                background-color: white;
                box-shadow: 0 0 10px #38d39f;

                &:hover {
                    font-size: 0.9em;
                    color: white;
                    background-color: #32be8f;
                    box-shadow: 0 0 30px #38d39f;
                    border: 2px solid white;
                }
            }

        .resume-container{
            >header {
                display: flex;
                justify-content:center;
            }
        }

        @keyframes rainbow {
            0% {
                border-color: red;
            }

            16.67% {
                border-color: orange;
            }

            33.33% {
                border-color: yellow;
            }

            50% {
                border-color: green;
            }

            66.67% {
                border-color: blue;
            }

            83.33% {
                border-color: indigo;
            }

            100% {
                border-color: violet;
            }
        }
        
    </style>
</head>

<body>
    @section('user', $userName) @section('elements')
    <button class="change_theme">Change Theme</button>
    @endsection @include('layouts.nav')
    <div class="dashboard-counts">
        @include('layouts.count')
    </div>

    <div class="resume-container">
        <main>
            @foreach ($resumes as $resume)
                <div class="card-container">
                    <img class="round" src="./images/{{ $resume->image }}" alt="{{ $resume->name }}" height="100"
                        width="100" />
                    <div class="applicant-info">
                        <h2>{{ $resume->name }}</h2>
                        <h4>{{ $resume->email }}</h4>
                        <h4>{{ $resume->contact }}</h4>
                    </div>
                    <div class="skills">
                        <h4>Skills</h4>
                        <ul>
                            @foreach ($resume->skills as $skill)
                                <li>{{ $skill }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="buttons">
                        <button class="primary" id="delete" data-id="{{ $resume->id }}">
                            Delete
                        </button>
                        <button class="primary ghost" id="view" data-id="{{ $resume->id }}">
                            View
                        </button>
                    </div>
                </div>
            @endforeach
        </main>

    </div>

    @include('layouts.modal')

    <script>
        document.querySelectorAll('.edit_resume').forEach(function(button) {
            button.addEventListener('click', function(e) {
                window.location.href = '/edit_resume/' + button.getAttribute('data-id');
            });
        });
        document.querySelectorAll('#view').forEach(function(button) {
            button.addEventListener('click', function(e) {
                window.location.href = '/dashboard/' + button.getAttribute('data-id');
            });
        });
        document.querySelectorAll('#delete').forEach(function(button) {
            button.addEventListener('click', function(e) {
                const modal = document.querySelector('.modal');
                modal.innerHTML = `
                    <div class="confirmation_card">
                        <div class="card-content">
                            <p class="card-heading">Delete file?</p>
                            <p class="card-description">Are you sure you want to delete this resume?</p>
                        </div>
                        <div class="card-button-wrapper">
                            <button class="card-button secondary" id="no" >Cancel</button>
                            <button class="card-button primary" id="yes" data-id="${button.getAttribute('data-id')}">Delete</button>
                        </div>
                    </div>
                    `;
                modal.style.display = 'flex';

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

        document
                .querySelector(".change_theme")
                .addEventListener("click", function () {
                    let theme = getCookie("dashboard_theme");
                    if (theme === "") {
                        theme = 1;
                    } else {
                        theme = theme == 1 ? 0 : 1;
                    }
                    setCookie("dashboard_theme", theme);
                    location.reload();
                });

            function setCookie(name, value) {
                const expires = new Date();
                expires.setTime(expires.getTime() + 30 * 24 * 60 * 60 * 1000);
                document.cookie = `${name}=${value};expires=${expires.toUTCString()};path=/`;
            }

            function getCookie(name) {
                const value = `; ${document.cookie}`;
                const parts = value.split(`; ${name}=`);
                if (parts.length === 2) return parts.pop().split(";").shift();
                return "";
            }

            document.querySelector('#add_resume').addEventListener('click', function() {
            window.location.href = '/add_resume';
        });
    </script>
</body>

</html>
