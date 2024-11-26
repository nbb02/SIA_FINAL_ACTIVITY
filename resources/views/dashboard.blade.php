<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <link rel="icon" href="./public/favicon.jpg" type="image/x-icon">
    <style>
        * {
            box-sizing: border-box;
            font-family: "Josefin Sans", sans-serif;
        }

        ::-webkit-scrollbar {
            width: 5px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 5em;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 5em;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        p,
        button {
            font-family: "Josefin Sans", sans-serif !important;
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

        .view_resume {
            background-color: green;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100px;
            height: 40px;
        }

        .delete_resume {
            background-color: maroon;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100px;
            height: 40px;
            padding: 3px;
        }

        p,
        h1 {
            margin: 0;
            padding: 0;
            font-family: 'Arial', 'Helvetica', sans-serif;
        }

        .yes {
            background-color: #dc3545;
            color: white;
        }

        .yes:hover {
            background-color: #c82333;
        }

        .no {
            background-color: #6c757d;
            color: white;
        }

        .no:hover {
            background-color: #5a6268;
        }

        .resume-cards {
            padding: 2em;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            position: relative;
            width: 25em;
            height: 18em;
            transition: all 0.5s;

            .resume_img {
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

                img {
                    object-fit: cover;
                    height: 100%;
                    width: 100%;
                }

                button {
                    position: absolute;
                    bottom: 0;
                    left: 50%;
                    transform: translate(-50%, 0);
                    display: none;
                    width: 100%;
                    background-color: #6c757dcc;
                    color: white;
                    border: none;
                    padding: 0.25em;
                }

                &:hover {
                    button {
                        display: block;
                    }
                }
            }

            >div {
                background: rgba(255, 255, 255, 0.2);
                border-radius: 16px;
                box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                backdrop-filter: blur(5px);
                -webkit-backdrop-filter: blur(5px);
                border: 1px solid rgba(255, 255, 255, 0.3);
                padding: 3em;
                padding-top: 4.5em;
                text-align: center;
                height: 9.5em;
                overflow: hidden !important;
                transition: all 0.5s;
                display: flex;
                flex-direction: column;
                gap: 0.5em;

                >p {
                    font-family: "Josefin Sans", sans-serif;
                }

                >p:first-of-type {
                    font-weight: bold;
                    font-size: 1.2em;
                }

                >footer {
                    display: flex;
                    gap: 0.5em;
                    margin-top: auto;

                    >button {
                        flex: 1;
                        padding: 0.25em 0.5em;
                    }
                }
            }

            .all {
                display: flex;
                flex-wrap: wrap;
                padding: 0.25em;
                gap: 0.25em;
                font-size: 0.85em;
                align-items: center;
                min-height: 4.5em;
                flex: 0 0 auto;
                justify-content: center;

                .all_skills,
                .all_applications {
                    display: none;
                }
            }

            &:hover {
                justify-content: center;
                height: 30em;

                .resume_img {
                    height: 10em;
                    width: 10em;
                    top: 1px;
                }

                .single {
                    display: none;
                }

                .all_skills,
                .all_applications {
                    display: block;
                }

                .all {
                    align-items: start;

                    >div {
                        flex: 1;
                    }

                }

                >div {
                    padding: 1em;
                    padding-top: 7em;
                    display: flex;
                    flex: 0 0 auto;
                    height: 20em;

                    >div {
                        flex: 1;
                        overflow: auto;


                        >div {
                            padding: 0.25em;

                            >p {
                                padding: 0.25em 0;
                                font-weight: bold;
                                font-size: 0.9em;
                            }

                            >div {
                                display: flex;
                                flex-direction: column;
                                gap: 0.25em;
                            }
                        }
                    }
                }
            }
        }

        .skill {
            padding: 0.5em;
            border: 1px solid gray;
            border-radius: 0.25em;
            width: max-content;
        }

        .application {
            display: flex;
            align-items: center;
            gap: 0.25em;
            text-transform: capitalize;
            border: 1px solid gray;
            width: max-content;
            padding: 0.25em;
            border-radius: 0.5em;

            img {
                display: block;
                height: 30px;
                width: 30px;
                border-radius: 50%;
            }
        }

        .modal {
            font-family: "Josefin Sans", sans-serif;
            padding: 1.5em;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            border-radius: 0.25em;
            border: 2px solid black;
            display: none;
            z-index: 5;

            flex-direction: column;
            gap: 0.25em;


            >p {
                font-size: 1rem;
                color: #333;
                margin-bottom: 20px;
            }

            footer {
                display: flex;
                justify-content: center;
                gap: 10px;

                button {
                    padding: 0.5em 1em;
                    border: none;
                    border-radius: 5px;
                    font-size: 1rem;
                    cursor: pointer;
                    transition: background-color 0.3s ease;
                }
            }
        }

        @keyframes move {
            100% {
                transform: translate3d(0, 0, 1px) rotate(360deg);
            }
        }

        .background {
            position: fixed;
            width: 100vw;
            height: 100vh;
            top: 0;
            left: 0;

            overflow: hidden;
        }

        .background span {
            width: 5vmin;
            height: 5vmin;
            border-radius: 20vmin;
            backface-visibility: hidden;
            position: absolute;
            animation: move;
            animation-duration: 10;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
        }

        .background span:nth-child(0) {
            color: #c9ff05;
            top: 27%;
            left: 94%;
            animation-duration: 33s;
            animation-delay: -15s;
            transform-origin: -16vw 1vh;
            box-shadow: -40vmin 0 5.086657851078138vmin currentColor;
        }

        .background span:nth-child(1) {
            color: #001cf0;
            top: 98%;
            left: 10%;
            animation-duration: 35s;
            animation-delay: -48s;
            transform-origin: -5vw 4vh;
            box-shadow: 40vmin 0 5.057450281371199vmin currentColor;
        }

        .background span:nth-child(2) {
            color: #ffffff;
            top: 42%;
            left: 84%;
            animation-duration: 35s;
            animation-delay: -23s;
            transform-origin: -16vw -4vh;
            box-shadow: 40vmin 0 5.145866919115379vmin currentColor;
        }

        .background span:nth-child(3) {
            color: #001cf0;
            top: 73%;
            left: 31%;
            animation-duration: 22s;
            animation-delay: -39s;
            transform-origin: 25vw 15vh;
            box-shadow: 40vmin 0 5.208819390436435vmin currentColor;
        }

        .background span:nth-child(4) {
            color: #c9ff05;
            top: 76%;
            left: 31%;
            animation-duration: 29s;
            animation-delay: -4s;
            transform-origin: 0vw 3vh;
            box-shadow: -40vmin 0 5.03819107855897vmin currentColor;
        }

        .background span:nth-child(5) {
            color: #ffffff;
            top: 27%;
            left: 46%;
            animation-duration: 42s;
            animation-delay: -15s;
            transform-origin: 4vw 21vh;
            box-shadow: -40vmin 0 5.349396840618188vmin currentColor;
        }

        .background span:nth-child(6) {
            color: #c9ff05;
            top: 43%;
            left: 66%;
            animation-duration: 37s;
            animation-delay: -35s;
            transform-origin: -23vw -12vh;
            box-shadow: 40vmin 0 5.738053081218908vmin currentColor;
        }

        .background span:nth-child(7) {
            color: #c9ff05;
            top: 13%;
            left: 94%;
            animation-duration: 50s;
            animation-delay: -38s;
            transform-origin: 12vw 23vh;
            box-shadow: 40vmin 0 5.469592952526774vmin currentColor;
        }

        .background span:nth-child(8) {
            color: #001cf0;
            top: 92%;
            left: 62%;
            animation-duration: 36s;
            animation-delay: -34s;
            transform-origin: -8vw 19vh;
            box-shadow: 40vmin 0 5.932296799769484vmin currentColor;
        }

        .background span:nth-child(9) {
            color: #c9ff05;
            top: 51%;
            left: 87%;
            animation-duration: 12s;
            animation-delay: -4s;
            transform-origin: 15vw -4vh;
            box-shadow: -40vmin 0 5.6954265923940595vmin currentColor;
        }

        .background span:nth-child(10) {
            color: #001cf0;
            top: 78%;
            left: 6%;
            animation-duration: 51s;
            animation-delay: -35s;
            transform-origin: -21vw -8vh;
            box-shadow: 40vmin 0 5.758921922612389vmin currentColor;
        }

        .background span:nth-child(11) {
            color: #001cf0;
            top: 71%;
            left: 96%;
            animation-duration: 48s;
            animation-delay: -21s;
            transform-origin: -16vw -7vh;
            box-shadow: 40vmin 0 5.400048028382142vmin currentColor;
        }

        .background span:nth-child(12) {
            color: #001cf0;
            top: 2%;
            left: 16%;
            animation-duration: 34s;
            animation-delay: -45s;
            transform-origin: 14vw -21vh;
            box-shadow: 40vmin 0 5.173415539241899vmin currentColor;
        }

        .background span:nth-child(13) {
            color: #001cf0;
            top: 30%;
            left: 25%;
            animation-duration: 14s;
            animation-delay: -46s;
            transform-origin: -9vw -24vh;
            box-shadow: 40vmin 0 5.160661982527359vmin currentColor;
        }

        .background span:nth-child(14) {
            color: #001cf0;
            top: 59%;
            left: 36%;
            animation-duration: 7s;
            animation-delay: -30s;
            transform-origin: 3vw 24vh;
            box-shadow: -40vmin 0 5.786067926787278vmin currentColor;
        }

        .background span:nth-child(15) {
            color: #c9ff05;
            top: 30%;
            left: 7%;
            animation-duration: 54s;
            animation-delay: -35s;
            transform-origin: 8vw -11vh;
            box-shadow: -40vmin 0 5.505180767627209vmin currentColor;
        }

        .background span:nth-child(16) {
            color: #001cf0;
            top: 43%;
            left: 45%;
            animation-duration: 45s;
            animation-delay: -11s;
            transform-origin: 20vw 14vh;
            box-shadow: 40vmin 0 5.240738166608159vmin currentColor;
        }

        .background span:nth-child(17) {
            color: #001cf0;
            top: 34%;
            left: 65%;
            animation-duration: 48s;
            animation-delay: -26s;
            transform-origin: 1vw -2vh;
            box-shadow: -40vmin 0 5.276421749459692vmin currentColor;
        }

        .background span:nth-child(18) {
            color: #c9ff05;
            top: 43%;
            left: 83%;
            animation-duration: 19s;
            animation-delay: -27s;
            transform-origin: -11vw 11vh;
            box-shadow: -40vmin 0 5.354256947324778vmin currentColor;
        }

        .background span:nth-child(19) {
            color: #c9ff05;
            top: 9%;
            left: 4%;
            animation-duration: 9s;
            animation-delay: -24s;
            transform-origin: 17vw 1vh;
            box-shadow: 40vmin 0 5.49383141672064vmin currentColor;
        }

        .whole_image {
            position: fixed;
            height: 80%;
            width: 80%;
            max-height: 30em;
            max-width: 30em;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            display: none;
            flex-direction: column;
            border-radius: 0.5em;
            background-color: white;
            box-shadow: 4px 4px 20px rgba(0, 0, 0, 0.3);
            padding: 0.25em;
            overflow: hidden;

            >button {
                padding: 0.5em;
            }

            >div {
                flex: 1;
                overflow: hidden;

                >img {
                    object-fit: contain;
                    height: 100%;
                    width: 100%;
                }
            }
        }

        .change_theme {
            background-color: transparent;
            padding: 1em 1.5em;
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
    </style>
</head>

<body>
    <div class="background">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    @section('user', $user)
    @section('elements')
    <button class="change_theme">Change Theme</button>
    @endsection
    @include('layouts.nav')
    <div class="resume-container">
        <main>
            @foreach ($resumes as $resume)
            <div class="resume-cards">
                <span class="resume_img">
                    <img src="./images/{{ $resume->image }}" alt="{{ $resume->name }}" height="50">
                    <button class="view_whole_image" data-src="./images/{{ $resume->image }}">View</button>
                </span>
                <div>
                    <p>{{$resume->name}}</p>
                    @if(!empty($resume->applications) || !empty($resume->skills))
                    <div class="all">
                        @if (!empty($resume->applications))
                        <div class="all_applications">
                            <p>Applications</p>
                            <div>
                                @foreach($resume->applications as $application)
                                <span class="application">
                                    <img src="{{$application['company_image']}}">
                                    <p>
                                        {{$application['status']}}
                                    </p>
                                </span>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        @if(!empty($resume->skills))
                        <div class="all_skills">
                            <p>Skills</p>
                            <div>
                                @foreach($resume->skills as $skill)
                                <span class="skill">
                                    {{$skill}}
                                </span>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        @if(!empty($resume->applications))
                        <span class="application single">
                            <img src="{{$resume->applications[count($resume->applications) - 1]['company_image']}}">
                            <p>
                                {{$resume->applications[count($resume->applications) - 1]['status']}}
                            </p>
                        </span>
                        @endif
                        @if(!empty($resume->skills))
                        <span class="skill single">
                            {{$resume->skills[count($resume->skills) - 1]}}
                        </span>
                        @endif
                    </div>
                    @endif
                    <footer>
                        <button class="delete_resume" data-id="{{$resume->id}}">Delete</button>
                        <button class="view_resume" data-id="{{$resume->id}}">View</button>
                    </footer>
                </div>
            </div>
            @endforeach
        </main>
    </div>
    <div class="whole_image">
        <div>
            <img id="whole_image_src" src="./images/undraw_resume_folder_2_arse.svg" alt="resume" />
        </div>
        <button id="close_whole_img">Close</button>
    </div>
    <script>
        document.querySelector('#close_whole_img').addEventListener('click', function() {
            document.querySelector('.whole_image').style.display = 'none';
        });
        document.querySelectorAll('.view_whole_image').forEach(function(btn) {
            btn.addEventListener('click', function() {
                document.querySelector('#whole_image_src').src = btn.getAttribute('data-src');
                document.querySelector('.whole_image').style.display = 'flex';
            });
        });
        document
            .querySelector(".change_theme")
            .addEventListener("click", function() {
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
    </script>
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
                <p>Are you sure you want to delete this resume?</p>
                <footer>
                    <button class="yes" data-id="${button.getAttribute('data-id')}">Yes</button>
                    <button class="no">No</button>
                </footer>`;
                modal.style.display = 'flex';
                document.querySelector('.yes').addEventListener('click', async function(e) {

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
                document.querySelector('.no').addEventListener('click', function(e) {
                    const modal = document.querySelector('.modal');
                    modal.innerHTML = '';
                    modal.style.display = 'none';
                });
            });

        });
    </script>
</body>

</html>