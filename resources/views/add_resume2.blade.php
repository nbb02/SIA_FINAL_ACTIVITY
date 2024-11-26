<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="icon" href="./favicon.jpg" type="image/x-icon">
    <title>Add Resume</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Geist:wght@100..900&family=Niramit:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&family=Pixelify+Sans:wght@400..700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            color: var(--text);
            font-family: 'Niramit';
        }

        body {
            background-color: var(--background);
            padding: 2rem;
        }

        textarea,
        input {
            background-color: transparent;
            padding: 0.5rem 1rem;

            border: 1px solid var(--primary);
            border-radius: 0.5rem;
            outline: none;

            box-shadow: 5px 5px 10px -10px rgba(0, 0, 0, 0.4);
        }

        textarea:focus,
        input:focus {
            background-color: var(--background);
            border-color: var(--text)
        }

        textarea {
            height: 5em;
            width: 100%;
        }

        button {
            background-color: var(--primary);
            padding: 0.5rem 1rem;
            color: var(--background);
            border: none;
            cursor: pointer;
            border-radius: 1rem;
            transition: all 0.18s;
        }

        button:hover {
            background-color: var(--background);
            box-shadow: 0 0 0 5px var(--accent);
            color: var(--primary);
        }

        .action-buttons {
            font-size: 1.2rem;
            font-weight: 600;
            padding: 0.5rem 2rem;
        }


        .container {
            display: grid;
            grid-template-columns: 1fr 2fr;
            grid-template-rows: 6fr 0.2fr;
            grid-column-gap: 2rem;
            grid-row-gap: 2rem;

            margin: 0 auto;
        }

        @media screen and (max-width:600px) {
            .container {
                display: flex;
                flex-direction: column;
                gap: 1em;
            }
            }

        .button-container {
            grid-area: 2 / 1 / 3 / 3;

            display: flex;
            align-items: center;
            justify-content: center;
            gap: 3rem;
        }

        .personal-info {
            background: #79c2e471;
            padding: 2rem;
            position: relative;
            display: flex;
            flex-direction: column;
            display: flex;
            gap: 2rem;
            align-items: center;

            border-radius: 2rem;
        }

        .profile-img-container {
            position: relative;
            width: 150px;
            height: 150px;
        }

        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 4px solid white;
            object-fit: cover;
        }

        .upload-icon {
            position: absolute;
            bottom: 0;
            right: 0;
            background: white;
            padding: 8px;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        #imageInput {
            display: none;
        }

        .info-section {
            display: flex;
            flex-direction: column;
            width: 80%;
        }

        .skill-section {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            width: 70%;

            >header {
                >h2 {
                    color: var(--text)
                }
            }

            .skills-input {
                display: flex;
                flex-direction: column;
                gap: 1rem;

                span {
                    position: relative;
                    width: 100%;

                    input {
                        width: 100%
                    }

                    button {
                        position: absolute;
                        left: 105%;
                        top: 50%;
                        transform: translateY(-50%);
                    }
                }
            }
        }


        .objective {
            margin-bottom: 2rem;
            border-bottom: 1px solid var(--primary);

            textarea {
                margin-bottom: 2rem;
                margin-top: 1rem;
            }
        }

        .education {
            h2 {
                margin-bottom: 1rem;
            }

            .education-level {
                display: flex;
                justify-content: center;
                flex-direction: column;
                margin-bottom: 2rem;
                border-bottom: 1px solid var(--primary);

                h3 {
                    margin-bottom: 1rem;
                }

                button {
                    margin: 1rem 0;
                }

                .education-container {
                    display: flex;
                    align-items: baseline;
                    gap: 1rem;
                    flex-wrap: wrap;

                    .education_content {
                        display: grid;
                        width: 32%;
                        min-width:14em;
                    }
                }
            }
        }

        .education:nth-last-child() {
            border-bottom: none;
        }

        .section {
            background-color: #79c2e471;
            padding: 1.5em;
            border-radius: 1.5em;
        }

        .edit-mode {
            display: none;
            padding: 1rem;
            background: #f8fafc;
            border-radius: 4px;
            margin-top: 1rem;
        }

        .edit-mode.active {
            display: block;
        }

        .save-btn {
            background: #1a365d;
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            margin-right: 1rem;
        }

        .cancel-btn {
            background: #dc2626;
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
        }

    .change_theme {
                background-color: transparent;
                padding: 0.5em 1em;
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

            @media (max-width:600px){
            #modal {
                padding: 1em !important;
                width: 95% !important;
            }
        }

        .nav_discard {
            background-color: transparent;
            padding: 0.5em 1em;
            border: 2px solid #dc2626;
            color: #dc2626;
            font-weight: 500;
            border-radius: 0.5em;
            background-color: white;
            box-shadow: 0 0 10px #dc2626;
            cursor: pointer;
            transition: all 0.3s;
        }

        .nav_discard:hover {
            color: white;
            background-color: #dc2626;
            box-shadow: 0 0 30px #dc2626;
            border: 2px solid white;
        }
    </style>
</head>

<body>
    @section('user', $user)
    @section('elements')
    <button class="change_theme">Change Theme</button>
    <button type="button" class="discard nav_discard">Discard</button>
    @endsection
    @include('layouts.nav')
    <form action="/dashboard" method="POST" enctype="multipart/form-data" class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf
        <div class="personal-info">
            <h2>Personal Info</h2>

            <div class="profile-img-container">
                <img src="{{ asset('images/default-avatar.jpg') }}" alt="Profile" id="profileImg" class="profile-img">
                <label for="imageInput" class="upload-icon">📷</label>
                <input type="file" id="imageInput" name="_image" accept="image/*">
            </div>

            <div class="info-section">
                <label>Full Name</label>
                <input type="text" name="name">
                <label for="email">Email</label>
                <input type="text" name="email">
                <label for="birthday">Birthday</label>
                <input id="birthday" name="birthday" type="date">
                <label>Age</label>
                <input id="age" type="text" readonly placeholder="Input Birthday First">
                <script>
                    document.querySelector('#birthday').addEventListener('change', function(e) {
                        const birthday = new Date(e.target.value);
                        const today = new Date();
                        const age = today.getFullYear() - birthday.getFullYear();
                        if (today.getMonth() < birthday.getMonth() || (today.getMonth() == birthday.getMonth() && today
                                .getDate() < birthday.getDate())) {
                            age--;
                        }
                        document.querySelector('#age').value = age;
                    })
                </script>
                <label for="address">Address</label>
                <input type="text" name="address">
                <label for="contact">Contact</label>
                <input type="text" name="contact">
            </div>

            <section class="skill-section">
                <header>
                    <h2>Skills</h2>
                </header>

                <div id="additional-skills" class="skills-input">
                    <input type="text" id="skills" name="skills[]" value="{{ old('skills.0') }}">
                    @foreach (old('skills', []) as $index => $skill)
                        @if ($index > 0)
                            <span>
                                <input type="text" name="skills[]" value="{{ $skill }}">
                                <button type="button" onclick="removeSkill(this)">Delete</button>
                            </span>
                        @endif
                    @endforeach
                </div>

                <button type="button" onclick="addSkill()">Add another skill</button>
            </section>

        </div>

        <div class="section">

            <section class="objective">
                <h2 class="section-title">Objectives</h2>
                <textarea name="objectives" placeholder="Your Objectives..."></textarea>
            </section>

            <section id="educationDisplay" class="education">
                <h2 class="section-title">Education</h2>

                <div class="education-level">
                    <h3>College</h3>
                    <div id="college_level" class="education-container">
                        @if (old('college_education'))
                            @foreach (old('college_education', []) as $index => $college)
                                <div id="college_education" class="education_content">
                                    <label for="college_name_{{ $index }}">School Name:</label>
                                    <input type="text" id="college_name_{{ $index }}"
                                        name="college_education[{{ $index }}][name]"
                                        value="{{ $college['name'] }}">

                                    <label for="college_course_{{ $index }}">Course/Program:</label>
                                    <input type="text" id="college_course_{{ $index }}"
                                        name="college_education[{{ $index }}][course]"
                                        value="{{ $college['course'] }}">

                                    <label for="college_location_{{ $index }}">Location:</label>
                                    <input type="text" id="college_location_{{ $index }}"
                                        name="college_education[{{ $index }}][location]"
                                        value="{{ $college['location'] }}">

                                    <label for="college_date_graduated_{{ $index }}">Date</label>
                                    <input type="text" id="college_date_graduated_{{ $index }}"
                                        name="college_education[{{ $index }}][date_graduated]"
                                        value="{{ $college['date_graduated'] }}">

                                    <button type="button" id="remove_college_education">Remove</button>
                                </div>
                            @endforeach
                        @else
                            <div id="college_education" class="education_content">
                                <label for="college_name_0">School Name:</label>
                                <input type="text" id="college_name_0" name="college_education[0][name]"
                                    value="">

                                <label for="college_course_0">Course/Program:</label>
                                <input type="text" id="college_course_0" name="college_education[0][course]"
                                    value="">

                                <label for="college_location_0">Location:</label>
                                <input type="text" id="college_location_0" name="college_education[0][location]"
                                    value="">

                                <label for="college_date_graduated_0">Date</label>
                                <input type="text" id="college_date_graduated_0"
                                    name="college_education[0][date_graduated]" value="">
                            </div>
                        @endif
                    </div>

                    <button type="button" id="add_college_education" onclick="addCollegeEducation()">Add Another
                        College Education</button>
                </div>

                <div class="education-level">
                    <h3>Senior High School</h3>
                    <div id="senior_level" class="education-container">
                        @if (old('senior_education'))
                            @foreach (old('senior_education', []) as $index => $senior)
                                <div id="senior_education-item" class="education_content">
                                    <label for="senior_name_{{ $index }}">School Name:</label>
                                    <input type="text" id="senior_name_{{ $index }}"
                                        name="senior_education[{{ $index }}][name]"
                                        value="{{ $senior['name'] }}">

                                    <label for="senior_course_{{ $index }}">Course/Program:</label>
                                    <input type="text" id="senior_course_{{ $index }}"
                                        name="senior_education[{{ $index }}][course]"
                                        value="{{ $senior['course'] }}">

                                    <label for="senior_location_{{ $index }}">Location:</label>
                                    <input type="text" id="senior_location_{{ $index }}"
                                        name="senior_education[{{ $index }}][location]"
                                        value="{{ $senior['location'] }}">

                                    <label for="senior_date_graduated_{{ $index }}">Date</label>
                                    <input type="text" id="senior_date_graduated_{{ $index }}"
                                        name="senior_education[{{ $index }}][date_graduated]"
                                        value="{{ $senior['date_graduated'] }}">

                                    <button type="button" id="remove_senior_education">Remove</button>
                                </div>
                            @endforeach
                        @else
                            <div id="senior_education-item" class="education_content">
                                <label for="senior_name_0">School Name:</label>
                                <input type="text" id="senior_name_0" name="senior_education[0][name]"
                                    value="">

                                <label for="senior_course_0">Course/Program:</label>
                                <input type="text" id="senior_course_0" name="senior_education[0][course]"
                                    value="">

                                <label for="senior_location_0">Location:</label>
                                <input type="text" id="senior_location_0" name="senior_education[0][location]"
                                    value="">

                                <label for="senior_date_graduated_0">Date</label>
                                <input type="text" id="senior_date_graduated_0"
                                    name="senior_education[0][date_graduated]" value="">
                            </div>
                        @endif
                    </div>
                    <button type="button" id="add_senior_education" onclick="addSeniorEducation()">Add Another
                        Senior Education</button>
                </div>

                <div class="education-level">
                    <h3>High School</h3>
                    <div id="highschool_level" class="education-container">
                        @if (old('highschool_education'))
                            @foreach (old('highschool_education', []) as $index => $highSchool)
                                <div id="highschool_education-item" class="education_content">
                                    <label for="highschool_name_{{ $index }}">School Name:</label>
                                    <input type="text" id="highschool_name_{{ $index }}"
                                        name="highschool_education[{{ $index }}][name]"
                                        value="{{ $highSchool['name'] }}">

                                    <label for="highschool_location_{{ $index }}">Location:</label>
                                    <input type="text" id="highschool_location_{{ $index }}"
                                        name="highschool_education[{{ $index }}][location]"
                                        value="{{ $highSchool['location'] }}">

                                    <label for="highschool_date_graduated_{{ $index }}">Date</label>
                                    <input type="text" id="highschool_date_graduated_{{ $index }}"
                                        name="highschool_education[{{ $index }}][date_graduated]"
                                        value="{{ $highSchool['date_graduated'] }}">

                                    <button type="button" class="remove_highschool_education">Remove</button>
                                </div>
                            @endforeach
                        @else
                            <div id="highschool_education-item" class="education_content">
                                <label for="highschool_name_0">School Name:</label>
                                <input type="text" id="highschool_name_0" name="highschool_education[0][name]"
                                    value="">

                                <label for="highschool_location_0">Location:</label>
                                <input type="text" id="highschool_location_0"
                                    name="highschool_education[0][location]" value="">

                                <label for="highschool_date_graduated_0">Date</label>
                                <input type="text" id="highschool_date_graduated_0"
                                    name="highschool_education[0][date_graduated]" value="">
                            </div>
                        @endif
                    </div>
                    <button type="button" id="add_highschool_education" onclick="addHighSchoolEducation()">Add
                        Another High School Education</button>
                </div>

                <div class="education-level">
                    <h3>Elementary</h3>
                    <div id="elementary_level" class="education-container">
                        @if (old('elementary_education'))
                            @foreach (old('elementary_education', []) as $index => $elementary)
                                <div id="elementary_education-item" clas="education_content">
                                    <label for="elementary_name_{{ $index }}">School Name:</label>
                                    <input type="text" id="elementary_name_{{ $index }}"
                                        name="elementary_education[{{ $index }}][name]"
                                        value="{{ $elementary['name'] }}">

                                    <label for="elementary_location_{{ $index }}">Location:</label>
                                    <input type="text" id="elementary_location_{{ $index }}"
                                        name="elementary_education[{{ $index }}][location]"
                                        value="{{ $elementary['location'] }}">

                                    <label for="elementary_date_graduated_{{ $index }}">Date</label>
                                    <input type="text" id="elementary_date_graduated_{{ $index }}"
                                        name="elementary_education[{{ $index }}][date_graduated]"
                                        value="{{ $elementary['date_graduated'] }}">

                                    <button type="button" class="remove_elementary_education">Remove</button>
                                </div>
                            @endforeach
                        @else
                            <div id="elementary_education-item" class="education_content">
                                <label for="elementary_name_0">School Name:</label>
                                <input type="text" id="elementary_name_0" name="elementary_education[0][name]"
                                    value="">

                                <label for="elementary_location_0">Location:</label>
                                <input type="text" id="elementary_location_0"
                                    name="elementary_education[0][location]" value="">

                                <label for="elementary_date_graduated_0">Date</label>
                                <input type="text" id="elementary_date_graduated_0"
                                    name="elementary_education[0][date_graduated]" value="">

                            </div>
                        @endif
                    </div>
                    <button type="button" id="add_elementary_education" onclick="addElementaryEducation()">Add
                        Another Elementary Education</button>
                </div>
            </section>
        </div>

        <div id="modal"
            style="position: fixed; top:50%;left:50%; transform:translate(-50%,-50%); background-color: white;
            border-radius: 0.25em; border: 2px solid black; padding:0.5em; display:none;">
            <div style="background:white; padding:2rem; border-radius:8px; text-align:center;">
                <p>Are you sure you want to discard changes?</p>
                <button type="button" onclick="confirmDiscard()">Yes</button>
                <button type="button" onclick="closeModal()">No</button>
            </div>
        </div>

        <div class="button-container">
            <button type="submit" class="action-buttons">Submit</button>
            <button type="button" class="discard" class="action-buttons">Discard</button>
        </div>

        <script>
            function confirmDiscard() {
                window.location.href = '/dashboard';
            }

            function closeModal() {
                document.getElementById('modal').style.display = 'none';
            }

            document.querySelectorAll('.discard').forEach(function(button) {
                button.addEventListener('click', function() {
                    document.getElementById('modal').style.display = 'flex';
                });
            });
        </script>
        </div>

        <script>
            document.getElementById('imageInput').addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('profileImg').src = e.target.result;
                    }
                    reader.readAsDataURL(file);
                }
            });
        </script>


        <script>
            // functions for skills

            // remove extra skills
            function removeSkill(button) {
                button.parentElement.remove();
            }

            // add extra skills
            function addSkill() {
                const newSkillContainer = document.createElement('span');
                const newSkill = document.createElement('input');
                newSkill.type = 'text';
                newSkill.name = 'skills[]';
                const deleteButton = document.createElement('button');
                deleteButton.type = 'button';
                deleteButton.textContent = 'Delete';
                deleteButton.onclick = function() {
                    removeSkill(deleteButton);
                };
                newSkillContainer.appendChild(newSkill);
                newSkillContainer.appendChild(deleteButton);
                document.getElementById('additional-skills').appendChild(newSkillContainer);
            }


            // school functions
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('#remove_college_education').forEach(function(button) {
                    button.addEventListener('click', function() {
                        removeEducation(button);
                    });
                });

                document.querySelectorAll('.remove_highschool_education').forEach(function(button) {
                    button.addEventListener('click', function() {
                        removeEducation(button);
                    });
                });

                document.querySelectorAll('#remove_senior_education').forEach(function(button) {
                    button.addEventListener('click', function() {
                        removeEducation(button);
                    });
                })

                document.querySelectorAll('.remove_elementary_education').forEach(function(button) {
                    button.addEventListener('click', function() {
                        removeEducation(button);
                    });
                });
            });

            // adding educations function
            function addCollegeEducation() {
                const index = document.querySelectorAll('#college_education').length;
                const newCollege = `
                        <div id="college_education-item" class="education_content">
                            <label for="college_name_${index}">School Name:</label>
                            <input type="text" id="college_name_${index}" name="college_education[${index}][name]" value="">

                            <label for="college_course_${index}">Course/Program:</label>
                            <input type="text" id="college_course_${index}" name="college_education[${index}][course]" value="">

                            <label for="college_location_${index}">Location:</label>
                            <input type="text" id="college_location_${index}" name="college_education[${index}][location]" value="">

                            <label for="college_date_graduated_${index}">Date</label>
                            <input type="text" id="college_date_graduated_${index}" name="college_education[${index}][date_graduated]" value="">

                            <button type="button" class="remove_college_education" onclick="removeEducation(this)">Remove</button>
                        </div>`;
                document.getElementById('college_level').insertAdjacentHTML('beforeend', newCollege);
            }

            function addSeniorEducation() {
                const index = document.querySelectorAll('#senior_education-item').length;
                const newSenior = `
                        <div id="senior_education-item" class="education_content">
                            <label for="senior_name_${index}">School Name:</label>
                            <input type="text" id="senior_name_${index}" name="senior_education[${index}][name]" value="">

                            <label for="senior_course_${index}">Course/Program:</label>
                            <input type="text" id="senior_course_${index}" name="senior_education[${index}][course]" value="">

                            <label for="senior_location_${index}">Location:</label>
                            <input type="text" id="senior_location_${index}" name="senior_education[${index}][location]" value="">

                            <label for="senior_date_graduated_${index}">Date</label>
                            <input type="text" id="senior_date_graduated_${index}" name="senior_education[${index}][date_graduated]" value="">

                            <button type="button" class="remove_senior_education" onclick="removeEducation(this)">Remove</button>
                        </div>`;
                document.getElementById('senior_level').insertAdjacentHTML('beforeend', newSenior);
            }

            function addHighSchoolEducation() {
                const index = document.querySelectorAll('#highschool_education-item').length;
                const newHighSchool = `
                        <div id="highschool_education-item" class="education_content">
                            <label for="highschool_name_${index}">School Name:</label>
                            <input type="text" id="highschool_name_${index}" name="highschool_education[${index}][name]" value="">

                            <label for="highschool_location_${index}">Location:</label>
                            <input type="text" id="highschool_location_${index}" name="highschool_education[${index}][location]" value="">

                            <label for="highschool_date_graduated_${index}">Date</label>
                            <input type="text" id="highschool_date_graduated_${index}" name="highschool_education[${index}][date_graduated]" value="">

                            <button type="button" class="remove_highschool_education" onclick="removeEducation(this)">Remove</button>
                        </div>`;
                document.getElementById('highschool_level').insertAdjacentHTML('beforeend', newHighSchool);
            }

            function addElementaryEducation() {
                const index = document.querySelectorAll('#elementary_education-item').length;
                const newElementary = `
                        <div id="elementary_education-item" class="education_content">
                            <label for="elementary_name_${index}">School Name:</label>
                            <input type="text" id="elementary_name_${index}" name="elementary_education[${index}][name]" value="">

                            <label for="elementary_location_${index}">Location:</label>
                            <input type="text" id="elementary_location_${index}" name="elementary_education[${index}][location]" value="">

                            <label for="elementary_date_graduated_${index}">Date</label>
                            <input type="text" id="elementary_date_graduated_${index}" name="elementary_education[${index}][date_graduated]" value="">

                            <button type="button" class="remove_elementary_education" onclick="removeEducation(this)">Remove</button>
                        </div>`;
                document.getElementById('elementary_level').insertAdjacentHTML('beforeend', newElementary);
            }

            function removeEducation(button) {
                button.parentElement.remove();
            }

            document
            .querySelector(".change_theme")
            .addEventListener("click", function() {
                let theme = getCookie("resume_theme");
                if (theme === "") {
                    theme = 1;
                } else {
                    theme = theme == 1 ? 0 : 1;
                }
                setCookie("resume_theme", theme);
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
