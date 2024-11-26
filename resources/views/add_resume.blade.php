<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./favicon.jpg" type="image/x-icon">
    <title>Add Resume</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Niramit", sans-serif;
        }

        body {
            background-color: #f0f2f5;
            padding: 2rem;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background: #1a365d;
            color: white;
            padding: 2rem;
            position: relative;
        }

        .profile-section {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .profile-img-container {
            position: relative;
            width: 150px;
            height: 150px;
            border: 4px solid white;
            border-radius: 50%;
        }

        .profile-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
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
            flex-grow: 1;
        }

        .section {
            padding: 2rem;
            border-bottom: 1px solid #e5e7eb;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .section-title {
            font-size: 1.5rem;
            color: #1a365d;
            font-weight: 600;
        }

        .edit-btn {
            padding: 0.5rem 1rem;
            background: transparent;
            border: 2px solid #1a365d;
            color: #1a365d;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s;
        }

        .edit-btn:hover {
            background: #1a365d;
            color: white;
        }

        .education-item {
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e5e7eb;
        }

        .education-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .form-row {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .form-group {
            flex: 1;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #4a5568;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #e5e7eb;
            border-radius: 4px;
            font-size: 1rem;
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

        .skill-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .skill-tag {
            background: #e5e7eb;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
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

        @media (max-width: 768px) {
            .profile-section {
                flex-direction: column;
                text-align: center;
            }

            .form-row {
                flex-direction: column;
            }

            body {
                padding: 1rem;
            }
        }

        input {
            background-color: white;
            font-size: 1em;
            padding: 0.25em;
        }

        .info-section {
            display: grid;
            grid-template-columns: 5em 15em;
            gap: 0.25em;
            align-items: center;


        }

        textarea,
        input {
            font-size: 1em;
            padding: 0.5em;
            border-radius: 0.25em;
            outline: none;
            border: 1px solid green;
            background-color: #f8fafccc;
        }

        textarea {
            height: 5em;
            width: 100%;

        }

        .education-item {
            >div {
                margin-left: 2em;

                >div {
                    display: grid;
                    gap: 0.25em;
                    grid-template-columns: 10em 15em;
                }
            }
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

        .education-item {
            > div {
                width: max-content;

                > div {
                    position: relative;
                    padding: 0.25em;
                    
                    > button {
                    position: absolute;
                    left:103% ;
                    top: 50%;
                    transform: translateY( -50%);
                    border: none;
                    padding: 0.5em 1em;
                    border-radius: 0.25em;
                    cursor: pointer;
                    color:red;
                    background-color: white;
                    border: 2px solid red;
                    font-size: 0.9em;
                    font-weight: bold;
                    
                    &:hover {
                        background-color: red;
                        color: white;
                    }
                    }
                }

                > div:has(button:hover) {
                    border: 2px solid red;
                    }
                }

                > button {
                    border: none;
                    padding: 0.5em 1em;
                    border-radius: 0.25em;
                    cursor: pointer;
                    color:#448aff;
                    background-color: white;
                    border: 2px solid #448aff;
                    font-size: 0.9em;
                    font-weight: bold;
                    
                    &:hover {
                        background-color: #448aff;
                        color: white;
                    }
                    }
            
        }
        .skills {
            > div:nth-child(2){
                flex-direction: column;
                padding:1em 0.5em;
                
                > span {
                    display: flex;
                    gap:0.5em;

                    > button {
                    padding: 0.2em 0.5em;
                    border-radius: 0.25em;
                    cursor: pointer;
                    color:red;
                    background-color: white;
                    border: 2px solid red;
                    font-size: 0.8em;
                    font-weight: bold;

                    &:hover {
                        background-color: red;
                        color: white;
                    }
                    }
                }
            }

            > button {
                    border: none;
                    padding: 0.5em 1em;
                    border-radius: 0.25em;
                    cursor: pointer;
                    color:#448aff;
                    background-color: white;
                    border: 2px solid #448aff;
                    font-size: 0.9em;
                    font-weight: bold;
                    
                    &:hover {
                        background-color: #448aff;
                        color: white;
                    }
                    }
        }
        footer {
            display: flex;
            gap: 1em;
            justify-content: end;
            padding:0.25em;

            > button {
                    border: none;
                    padding: 0.5em 1em;
                    border-radius: 0.25em;
                    cursor: pointer;
                    color:#448aff;
                    background-color: white;
                    border: 2px solid #448aff;
                    font-size: 0.9em;
                    font-weight: bold;
                    border-radius:0.5em;
            }

            > button:nth-child(1){
                color:red;
                background-color: white;
                border: 2px solid red;

                &:hover {
                    background-color: red;
                    color: white;
                }
            }
            > button:nth-child(2){
                color:green;
                background-color: white;
                border: 2px solid green;

                &:hover {
                    background-color: green;
                    color: white;
                }
            }
        }
        #modal{
            > div {
                background-color: white;
                padding: 2rem;
                border-radius: 8px;
                text-align: center;

                > p {
                    margin-bottom: 1rem;
                    font-size: 1.2rem;
                    color: #333;
                }

                > button {
                    border: none;
                    padding: 0.5em 1em;
                    border-radius: 0.25em;
                    cursor: pointer;
                    font-size: 0.9em;
                    font-weight: bold;
                    margin: 0 0.5em;
                }

                > button:nth-child(2) {
                    color: red;
                    background-color: white;
                    border: 2px solid red;
                }

                > button:nth-child(2):hover {
                    background-color: red;
                    color: white;
                }

                > button:nth-child(3) {
                    color: green;
                    background-color: white;
                    border: 2px solid green;
                }

                > button:nth-child(3):hover {
                    background-color: green;
                    color: white;
                }
            }
        }

        @media (max-width:600px){
            .info-section, .education-item > div > div, .skills span{
                display: flex;
                flex-direction: column;
            }
            .education-item > div > div {
                > button {
                    top: 0;
                    left: 0;
                    transform: translate(0);
                    position: relative;
                }
            }
            #modal {
                padding: 1em;
                width: 95%;
            }

            button{
                padding: 0.25em !important;
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
        @section('show_add', false)
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
        <div class="header">
            <div class="profile-section">
                <div class="profile-img-container">
                    <img src="" alt="Profile" id="profileImg" class="profile-img">
                    <label for="imageInput" class="upload-icon">📷</label>
                    <input type="file" id="imageInput" name="_image" accept="image/*">
                </div>
                <div class="info-section">
                    <label for="name">Full Name</label>
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
                            if (today.getMonth() < birthday.getMonth() || (today.getMonth() == birthday.getMonth() && today.getDate() < birthday.getDate())) {
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
            </div>
        </div>
        <div class="section" id="personal-edit" style="display: none;">
            <div class="form-row">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" id="nameInput" value="John Doe">
                </div>
                <div class="form-group">
                    <label>Age</label>
                    <input type="number" id="ageInput" value="25">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Birthday</label>
                    <input type="date" id="bdayInput">
                </div>
                <div class="form-group">
                    <label>Contact</label>
                    <input type="tel" id="contactInput" value="(555) 123-4567">
                </div>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" id="addressInput" value="123 Main St, City">
            </div>
        </div>
        <div class="section">
            <div class="section-header">
                <h2 class="section-title">Objectives</h2>
            </div>
            <textarea name="objectives">To secure a challenging position that will enable me to use my strong organizational skills, educational background, and ability to work well with people.</textarea>
        </div>

        <div class="section">
            <div class="section-header">
                <h2 class="section-title">Education</h2>
            </div>
            <div id="educationDisplay">
                <div class="education-item">
                    <h3>College</h3>
                    <div id="college_education">
                        @if (old('college_education'))
                        @foreach (old('college_education', []) as $index => $college)
                        <div class="college_education-item">
                            <label for="college_name_{{ $index }}">School Name:</label>
                            <input type="text" id="college_name_{{ $index }}" name="college_education[{{ $index }}][name]" value="{{ $college['name'] }}">

                            <label for="college_course_{{ $index }}">Course/Program:</label>
                            <input type="text" id="college_course_{{ $index }}" name="college_education[{{ $index }}][course]" value="{{ $college['course'] }}">

                            <label for="college_location_{{ $index }}">Location:</label>
                            <input type="text" id="college_location_{{ $index }}" name="college_education[{{ $index }}][location]" value="{{ $college['location'] }}">

                            <label for="college_date_graduated_{{ $index }}">Year Graduated/Range</label>
                            <input type="date" id="college_date_graduated_{{ $index }}" name="college_education[{{ $index }}][date_graduated]" value="{{ $college['date_graduated'] }}">

                            <button type="button" class="remove_college_education">Remove</button>
                        </div>
                        @endforeach
                        @else
                        <div class="college_education-item">
                            <label for="college_name_0">School Name:</label>
                            <input type="text" id="college_name_0" name="college_education[0][name]" value="">

                            <label for="college_course_0">Course/Program:</label>
                            <input type="text" id="college_course_0" name="college_education[0][course]" value="">

                            <label for="college_location_0">Location:</label>
                            <input type="text" id="college_location_0" name="college_education[0][location]" value="">

                            <label for="college_date_graduated_0">Year Graduated/Range</label>
                            <input type="date" id="college_date_graduated_0" name="college_education[0][date_graduated]" value="">

                            <button type="button" class="remove_college_education">Remove</button>
                        </div>
                        @endif
                    </div>
                    <button type="button" id="add_college_education" onclick="addCollegeEducation()">Add Another College Education</button>
                </div>
                <div class="education-item">
                    <h3>Senior High School</h3>
                    <div id="senior_education">
                        @if (old('senior_education'))
                        @foreach (old('senior_education', []) as $index => $senior)
                        <div class="senior_education-item">
                            <label for="senior_name_{{ $index }}">School Name:</label>
                            <input type="text" id="senior_name_{{ $index }}" name="senior_education[{{ $index }}][name]" value="{{ $senior['name'] }}">

                            <label for="senior_course_{{ $index }}">Course/Program:</label>
                            <input type="text" id="senior_course_{{ $index }}" name="senior_education[{{ $index }}][course]" value="{{ $senior['course'] }}">

                            <label for="senior_location_{{ $index }}">Location:</label>
                            <input type="text" id="senior_location_{{ $index }}" name="senior_education[{{ $index }}][location]" value="{{ $senior['location'] }}">

                            <label for="senior_date_graduated_{{ $index }}">Year Graduated/Range</label>
                            <input type="text" id="senior_date_graduated_{{ $index }}" name="senior_education[{{ $index }}][date_graduated]" value="{{ $senior['date_graduated'] }}">

                            <button type="button" class="remove_senior_education">Remove</button>
                        </div>
                        @endforeach
                        @else
                        <div class="senior_education-item">
                            <label for="senior_name_0">School Name:</label>
                            <input type="text" id="senior_name_0" name="senior_education[0][name]" value="">

                            <label for="senior_course_0">Course/Program:</label>
                            <input type="text" id="senior_course_0" name="senior_education[0][course]" value="">

                            <label for="senior_location_0">Location:</label>
                            <input type="text" id="senior_location_0" name="senior_education[0][location]" value="">

                            <label for="senior_date_graduated_0">Year Graduated/Range</label>
                            <input type="text" id="senior_date_graduated_0" name="senior_education[0][date_graduated]" value="">

                            <button type="button" class="remove_senior_education">Remove</button>
                        </div>
                        @endif
                    </div>
                    <button type="button" id="add_senior_education" onclick="addSeniorEducation()">Add Another Senior Education</button>

                </div>
                <div class="education-item">
                    <h3>High School</h3>
                    <div id="highschool_education">
                        @if (old('highschool_education'))
                        @foreach (old('highschool_education', []) as $index => $highSchool)
                        <div class="highschool_education-item">
                            <label for="highschool_name_{{ $index }}">School Name:</label>
                            <input type="text" id="highschool_name_{{ $index }}" name="highschool_education[{{ $index }}][name]" value="{{ $highSchool['name'] }}">

                            <label for="highschool_location_{{ $index }}">Location:</label>
                            <input type="text" id="highschool_location_{{ $index }}" name="highschool_education[{{ $index }}][location]" value="{{ $highSchool['location'] }}">

                            <label for="highschool_date_graduated_{{ $index }}">Year Graduated/Range</label>
                            <input type="text" id="highschool_date_graduated_{{ $index }}" name="highschool_education[{{ $index }}][date_graduated]" value="{{ $highSchool['date_graduated'] }}">

                            <button type="button" class="remove_highschool_education">Remove</button>
                        </div>
                        @endforeach
                        @else
                        <div class="highschool_education-item">
                            <label for="highschool_name_0">School Name:</label>
                            <input type="text" id="highschool_name_0" name="highschool_education[0][name]" value="">

                            <label for="highschool_location_0">Location:</label>
                            <input type="text" id="highschool_location_0" name="highschool_education[0][location]" value="">

                            <label for="highschool_date_graduated_0">Year Graduated/Range</label>
                            <input type="text" id="highschool_date_graduated_0" name="highschool_education[0][date_graduated]" value="">

                            <button type="button" class="remove_highschool_education">Remove</button>
                        </div>
                        @endif
                    </div>
                    <button type="button" id="add_highschool_education" onclick="addHighSchoolEducation()">Add Another High School Education</button>

                </div>
                <div class="education-item">
                    <h3>Elementary</h3>
                    <div id="elementary_education">
                        @if (old('elementary_education'))
                        @foreach (old('elementary_education', []) as $index => $elementary)
                        <div class="elementary_education-item">
                            <label for="elementary_name_{{ $index }}">School Name:</label>
                            <input type="text" id="elementary_name_{{ $index }}" name="elementary_education[{{ $index }}][name]" value="{{ $elementary['name'] }}">

                            <label for="elementary_course_{{ $index }}">Course/Program:</label>
                            <input type="text" id="elementary_course_{{ $index }}" name="elementary_education[{{ $index }}][course]" value="{{ $elementary['course'] }}">

                            <label for="elementary_location_{{ $index }}">Location:</label>
                            <input type="text" id="elementary_location_{{ $index }}" name="elementary_education[{{ $index }}][location]" value="{{ $elementary['location'] }}">

                            <label for="elementary_date_graduated_{{ $index }}">Year Graduated/Range</label>
                            <input type="text" id="elementary_date_graduated_{{ $index }}" name="elementary_education[{{ $index }}][date_graduated]" value="{{ $elementary['date_graduated'] }}">

                            <button type="button" class="remove_elementary_education">Remove</button>
                        </div>
                        @endforeach
                        @else
                        <div class="elementary_education-item">
                            <label for="elementary_name_0">School Name:</label>
                            <input type="text" id="elementary_name_0" name="elementary_education[0][name]" value="">

                            <label for="elementary_course_0">Course/Program:</label>
                            <input type="text" id="elementary_course_0" name="elementary_education[0][course]" value="">

                            <label for="elementary_location_0">Location:</label>
                            <input type="text" id="elementary_location_0" name="elementary_education[0][location]" value="">

                            <label for="elementary_date_graduated_0">Year Graduated/Range</label>
                            <input type="text" id="elementary_date_graduated_0" name="elementary_education[0][date_graduated]" value="">

                            <button type="button" class="remove_elementary_education">Remove</button>
                        </div>
                        @endif
                    </div>
                    <button type="button" id="add_elementary_education" onclick="addElementaryEducation()">Add Another Elementary Education</button>
                </div>
            </div>
        </div>
        <div class="section skills">
            <div class="section-header">
                <h2 class="section-title">Skills</h2>
            </div>
            <div id="additional-skills" style="display: flex;gap:0.5em;flex-wrap:wrap;">
                <span>
                    <input type="text" id="skills" name="skills[]" value="{{ old('skills.0') }}">
                    <button type="button" onclick="removeSkill(this)">Delete</button>
                </span>
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
          
        </div>
        <footer>
            <button type="button" class="discard">Discard</button>
            <button type="submit">Submit</button>
        </footer>
        <div id="modal" style="position: fixed; top:50%;left:50%; transform:translate(-50%,-50%); background-color: white;
            border-radius: 0.25em; border: 2px solid black; padding:0.5em; display:none;">
        </div>
        <script>
                           document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.remove_college_education').forEach(function(button) {
                    button.addEventListener('click', function() {
                        removeEducation(button);
                    });
                });

                document.querySelectorAll('.remove_highschool_education').forEach(function(button) {
                    button.addEventListener('click', function() {
                        removeEducation(button);
                    });
                });

                document.querySelectorAll('.remove_elementary_education').forEach(function(button) {
                    button.addEventListener('click', function() {
                        removeEducation(button);
                    });
                });
            });

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

            function removeSkill(button) {
                const modal =  document.querySelector('#modal');
                modal.style.display = 'flex';
                modal.innerHTML = `
                  <div style="background:white; padding:2rem; border-radius:8px; text-align:center;">
                    <p>Are you sure you want to delete this skill?</p>
                                <button type="button" id="confirmRemoveSkill">Yes</button>
                                <button type="button" onclick="closeModal()">No</button>
                    </div>`;

                document.querySelector('#confirmRemoveSkill').addEventListener('click', function(){
                    button.parentElement.remove();
                    closeModal();
                })
            }

            function addCollegeEducation() {
                const index = document.querySelectorAll('.college_education-item').length;
                const newCollege = `
                    <div class="college_education-item">
                        <label for="college_name_${index}">School Name:</label>
                        <input type="text" id="college_name_${index}" name="college_education[${index}][name]" value="">

                        <label for="college_course_${index}">Course/Program:</label>
                        <input type="text" id="college_course_${index}" name="college_education[${index}][course]" value="">

                        <label for="college_location_${index}">Location:</label>
                        <input type="text" id="college_location_${index}" name="college_education[${index}][location]" value="">

                        <label for="college_date_graduated_${index}">Year Graduated/Range</label>
                        <input type="text" id="college_date_graduated_${index}" name="college_education[${index}][date_graduated]" value="">

                        <button type="button" class="remove_college_education" onclick="removeEducation(this)">Remove</button>
                    </div>`;
                document.getElementById('college_education').insertAdjacentHTML('beforeend', newCollege);
            }

            function addSeniorEducation() {
                const index = document.querySelectorAll('.senior_education-item').length;
                const newSenior = `
                    <div class="senior_education-item">
                        <label for="senior_name_${index}">School Name:</label>
                        <input type="text" id="senior_name_${index}" name="senior_education[${index}][name]" value="">

                        <label for="senior_course_${index}">Course/Program:</label>
                        <input type="text" id="senior_course_${index}" name="senior_education[${index}][course]" value="">

                        <label for="senior_location_${index}">Location:</label>
                        <input type="text" id="senior_location_${index}" name="senior_education[${index}][location]" value="">

                        <label for="senior_date_graduated_${index}">Year Graduated/Range</label>
                        <input type="text" id="senior_date_graduated_${index}" name="senior_education[${index}][date_graduated]" value="">

                        <button type="button" class="remove_senior_education" onclick="removeEducation(this)">Remove</button>
                    </div>`;
                document.getElementById('senior_education').insertAdjacentHTML('beforeend', newSenior);
            }

            function addHighSchoolEducation() {
                const index = document.querySelectorAll('.highschool_education-item').length;
                const newHighSchool = `
                    <div class="highschool_education-item">
                        <label for="highschool_name_${index}">School Name:</label>
                        <input type="text" id="highschool_name_${index}" name="highschool_education[${index}][name]" value="">

                        <label for="highschool_location_${index}">Location:</label>
                        <input type="text" id="highschool_location_${index}" name="highschool_education[${index}][location]" value="">

                        <label for="highschool_date_graduated_${index}">Year Graduated/Range</label>
                        <input type="text" id="highschool_date_graduated_${index}" name="highschool_education[${index}][date_graduated]" value="">

                        <button type="button" class="remove_highschool_education" onclick="removeEducation(this)">Remove</button>
                    </div>`;
                document.getElementById('highschool_education').insertAdjacentHTML('beforeend', newHighSchool);
            }

            function addElementaryEducation() {
                const index = document.querySelectorAll('.elementary_education-item').length;
                const newElementary = `
                    <div class="elementary_education-item">
                        <label for="elementary_name_${index}">School Name:</label>
                        <input type="text" id="elementary_name_${index}" name="elementary_education[${index}][name]" value="">

                        <label for="elementary_course_${index}">Course/Program:</label>
                        <input type="text" id="elementary_course_${index}" name="elementary_education[${index}][course]" value="">

                        <label for="elementary_location_${index}">Location:</label>
                        <input type="text" id="elementary_location_${index}" name="elementary_education[${index}][location]" value="">

                        <label for="elementary_date_graduated_${index}">Year Graduated/Range</label>
                        <input type="text" id="elementary_date_graduated_${index}" name="elementary_education[${index}][date_graduated]" value="">

                        <button type="button" class="remove_elementary_education" onclick="removeEducation(this)">Remove</button>
                    </div>`;
                document.getElementById('elementary_education').insertAdjacentHTML('beforeend', newElementary);
            }


            function removeEducation(button) {
                const modal =  document.querySelector('#modal');
                modal.style.display = 'flex';
                modal.innerHTML = `
                  <div style="background:white; padding:2rem; border-radius:8px; text-align:center;">
                    <p>Are you sure you want to delete this Education?</p>
                                <button type="button" id="confirmRemoveEducation">Yes</button>
                                <button type="button" onclick="closeModal()">No</button>
                    </div>`;

                document.querySelector('#confirmRemoveEducation').addEventListener('click', function(){
                    button.parentElement.remove();
                    closeModal();
                })
            }

        </script>
        <script>
            function confirmDiscard() {
                window.location.href = '/dashboard';
            }

            function closeModal() {
                document.getElementById('modal').style.display = 'none';
                document.getElementById('modal').innerHTML = '';
            }

            document.querySelectorAll('.discard').forEach(function(button) {
                button.addEventListener('click', function() {
                    document.getElementById('modal').style.display = 'flex';
                    document.getElementById('modal').innerHTML = `
                     <div style="background:white; padding:2rem; border-radius:8px; text-align:center;">
                    <p>Are you sure you want to discard changes?</p>
                    <button type="button" onclick="confirmDiscard()">Yes</button>
                    <button type="button" onclick="closeModal()">No</button>
                </div>
                    `;
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