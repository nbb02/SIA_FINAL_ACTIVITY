<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />

        <style>
            @import url("https://fonts.googleapis.com/css2?family=Geist:wght@100..900&family=Niramit:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&family=Pixelify+Sans:wght@400..700&display=swap");

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

            * {
                box-sizing: border-box;
                font-family: "Niramit", sans-serif;
                color: var(--text);
            }

            body {
                background-color: var(--background);
                padding: 0;
                margin: 0;
                position: relative;
            }

            main {
                display: flex;
                justify-content: space-around;
                padding: 5rem;
                position: relative;
                flex-wrap: wrap;
                gap: 1em;
            }

            .dashboard-counts {
                display: flex;
                justify-content: center;
                gap: 6rem;
                flex-wrap: wrap;

                margin-top: 4rem;
                margin-left: 2rem;
            }

            .card-container {
                position: relative;
                background-color: var(--secondary);
                border-radius: 0.75rem;
                box-shadow: 0px 10px 20px -10px rgba(0, 0, 0, 0.75);
                color: #b3b8cd;
                padding: 0 2rem;
                padding-top: 30px;

                width: 350px;
                height: 300px;
                max-width: 100%;
                text-align: center;
                overflow-y: hidden;
                display: flex;
                flex-direction: column;

                transition: all 0.18s ease-in-out;

                min-width: 15em;
                align-items: center;

                overflow: hidden;

                >div:first-of-type{
                  margin-bottom: 2em;
                }
            }


            .card-container:hover {
                background-color: var(--accent);
                height: 500px;
                padding-bottom: 30px;
                padding: 1em;

                border: 3px solid transparent;
                animation: rainbow 5s linear infinite;

                .single {
                    display: none;
                }

                .all_skills,
                .all_applications {
                    display: block !important;
                }

                .all {
                    align-items: start;
                    overflow: auto;
                    height: 15em;

                    > div {
                        > p {
                            font-weight: bold;
                        }
                        flex:1;
                        > div {
                            display:flex;
                            flex-direction:column;
                            gap:0.25em;
                        }
                    }
                }
            }

            .card-container .applicant-info {
                margin-bottom: 1rem;

                h4 {
                    margin: 1rem 0;
                }
            }

            .card-container .round {
                border: 1px solid var(--text);
                border-radius: 50%;
                padding: 7px;
                width: 150px;
                height: 150px;
                flex: 0 0 auto;
            }

            /* .skills {
                text-align: left;
                padding: 1rem;

                ul {
                    list-style-type: none;
                    margin: 0;
                    padding: 0;
                }

                li {
                    border: 2px solid #2d2747;
                    border-radius: 0.5rem;
                    display: inline-block;
                    font-size: 1rem;
                    font-weight: 700;
                    margin: 0 7px 7px 0;
                    padding: 0.5rem;
                }
            } */

            .buttons {
                display: flex;
                justify-content: space-around;
                align-items: center;
                height: 3rem;
                width: 100%;
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

            .change_theme {
                background-color: transparent;
                padding: 0.25em 0.5em;
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
            
            .resume-cards {
                display: flex;
                flex-direction: column;
                justify-content: flex-end;
                position: relative;
                width: 100%;
                height: 18em;
                transition: all 0.5s;

                /* .resume_img {
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
                } */
                 p {
                    margin: 0;
                 }

                > div {
                    background: rgba(255, 255, 255, 0.2);
                    border-radius: 16px;
                    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                    backdrop-filter: blur(5px);
                    -webkit-backdrop-filter: blur(5px);
                    border: 1px solid rgba(255, 255, 255, 0.3);
                    padding: 3em;
                    padding-top: 4.5em;
                    transition: all 0.5s;
                    gap: 0.5em;

                    > p {
                        font-family: "Josefin Sans", sans-serif;
                    }

                    > p:first-of-type {
                        font-weight: bold;
                        font-size: 1.2em;
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
                    overflow: auto;

                    .all_skills,
                    .all_applications {
                        display: none;
                    }
                }

                &:hover {

                    /* .resume_img {
                        height: 10em;
                        width: 10em;
                        top: 1px;
                    } */

                   

                    

                    /* > div {
                        padding: 1em;
                        display: flex;
                        flex: 0 0 auto;
                        height: 20em;

                        > div {
                            flex: 1;
                            overflow: auto;

                            > div {
                                padding: 0.25em;

                                > p {
                                    padding: 0.25em 0;
                                    font-weight: bold;
                                    font-size: 0.9em;
                                }

                                > div {
                                    display: flex;
                                    flex-direction: column;
                                    gap: 0.25em;
                                }
                            }
                        }
                    } */
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
        </style>
    </head>

    <body>
        @section('user', $userName) @section('elements')
        <button class="change_theme">Change Theme</button>
        @endsection @include('layouts.nav')
        <div class="dashboard-counts">@include('layouts.count')</div>
        <div class="resume-container">
            <main>
                @foreach ($resumes as $resume)
                <div class="card-container">
                        <img
                        class="round"
                        src="./images/{{ $resume->image }}"
                        alt="{{ $resume->name }}"
                        height="100"
                        />
                    <div class="resume-cards">
                        <p>{{$resume->name}}</p>
                        @if(!empty($resume->applications) ||
                        !empty($resume->skills))
                        <div class="all">
                            @if (!empty($resume->applications))
                            <div class="all_applications">
                                <p>Applications</p>
                                <div>
                                    @foreach($resume->applications as $application)
                                    <span class="application">
                                        <img
                                            src="{{
                                                $application['company_image']
                                            }}"
                                        />
                                        <p>
                                            {{ $application["status"] }}
                                        </p>
                                    </span>
                                    @endforeach
                                </div>
                            </div>
                            @endif @if(!empty($resume->skills))
                            <div class="all_skills">
                                <p>Skills</p>
                                <div>
                                    @foreach($resume->skills as $skill)
                                    <span class="skill">
                                        {{ $skill }}
                                    </span>
                                    @endforeach
                                </div>
                            </div>
                            @endif @if(!empty($resume->applications))
                            <span class="application single">
                                <img
                                    src="{{$resume->applications[count($resume->applications) - 1]['company_image']}}"
                                />
                                <p>
                                    {{$resume->applications[count($resume->applications) - 1]['status']}}
                                </p>
                            </span>
                            @endif @if(!empty($resume->skills))
                            <span class="skill single">
                                {{$resume->skills[count($resume->skills) - 1]}}
                            </span>
                            @endif
                        </div>
                        @endif
                    </div>
                    <div class="buttons">
                        <button
                            class="primary"
                            id="delete"
                            data-id="{{ $resume->id }}"
                        >
                            Delete
                        </button>
                        <button
                            class="primary ghost"
                            id="view"
                            data-id="{{ $resume->id }}"
                        >
                            View
                        </button>
                    </div>
                </div>
                @endforeach
               
            </main>
        </div>
        @include('layouts.modal')

        <script>
            document
                .querySelectorAll(".edit_resume")
                .forEach(function (button) {
                    button.addEventListener("click", function (e) {
                        window.location.href =
                            "/edit_resume/" + button.getAttribute("data-id");
                    });
                });
            document.querySelectorAll("#view").forEach(function (button) {
                button.addEventListener("click", function (e) {
                    window.location.href =
                        "/dashboard/" + button.getAttribute("data-id");
                });
            });
            document.querySelectorAll("#delete").forEach(function (button) {
                button.addEventListener("click", function (e) {
                    const modal = document.querySelector(".modal");
                    modal.innerHTML = `
                    <div class="confirmation_card">
                        <div class="card-content">
                            <p class="card-heading">Delete file?</p>
                            <p class="card-description">Are you sure you want to delete this resume?</p>
                        </div>
                        <div class="card-button-wrapper">
                            <button class="card-button secondary" id="no" >Cancel</button>
                            <button class="card-button primary" id="yes" data-id="${button.getAttribute(
                                "data-id"
                            )}">Delete</button>
                        </div>
                    </div>
                    `;
                    modal.style.display = "flex";

                    document
                        .querySelector("#yes")
                        .addEventListener("click", async function (e) {
                            await fetch(
                                "/dashboard/" + button.getAttribute("data-id"),
                                {
                                    method: "DELETE",
                                    headers: {
                                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                    },
                                }
                            ).then((response) => {
                                if (response.ok) {
                                    window.location.reload();
                                } else {
                                    alert("Failed to delete resume.");
                                }
                            });
                        });
                    document
                        .querySelector("#no")
                        .addEventListener("click", function (e) {
                            const modal = document.querySelector(".modal");
                            modal.innerHTML = "";
                            modal.style.display = "none";
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
        </script>
    </body>
</html>
