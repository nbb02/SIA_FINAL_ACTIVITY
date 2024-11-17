<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Resume</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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

       form {
        .info-section {
            display: grid;
            grid-template-columns: 5em 15em;
            gap: 0.25em;
            align-items: center;
        }
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
    </style>
</head>

<body>
    @section('user', $user)
    @section('elements')
    <a href="/dashboard">
        <button>Back</button>
    </a>
    @endsection
    @include('layouts.nav')
    @if(request()->has('edit') && request()->get('edit') == 'true')

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
                    <img src="/images/{{$image}}" alt="Profile" id="profileImg" class="profile-img">
                    <label for="imageInput" class="upload-icon">📷</label>
                    <input type="file" id="imageInput" name="_image" accept="image/*">
                </div>
                <div class="info-section">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" value="{{ $name }}">

                    <label for="email">Email</label>
                    <input type="text" name="email" value="{{ isset($email) ? $email : '' }}">

                    <label for="birthday">Birthday</label>
                    <input id="birthday" name="birthday" type="date" value="{{ isset($birthday) ? $birthday : '' }}">

                    <label>Age</label>
                    <input id="age" type="text" readonly>

                    <script>
                        function calculateAge(birthday) {
                            const today = new Date();
                            const birthDate = new Date(birthday);
                            let age = today.getFullYear() - birthDate.getFullYear();
                            const monthDifference = today.getMonth() - birthDate.getMonth();
                            if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
                                age--;
                            }
                            return age;
                        }

                        document.addEventListener('DOMContentLoaded', function() {
                            const birthdayInput = document.querySelector('#birthday');
                            if (birthdayInput.value) {
                                document.querySelector('#age').value = calculateAge(birthdayInput.value);
                            }

                            birthdayInput.addEventListener('change', function(e) {
                                document.querySelector('#age').value = calculateAge(e.target.value);
                            });
                        });
                    </script>

                    <label for="address">Address</label>
                    <input type="text" name="address" value="{{ isset($address) ? $address : '' }}">

                    <label for="contact">Contact</label>
                    <input type="text" name="contact" value="{{ isset($contact) ? $contact : '' }}">

                </div>
            </div>
        </div>

        <div class="section">
            <div class="section-header">
                <h2 class="section-title">Objectives</h2>
            </div>
            <textarea name="objectives">{{ isset($objective) ? $objective : '' }}</textarea>
        </div>

        <div class="section">
            <div class="section-header">
                <h2 class="section-title">Education</h2>
            </div>
            <div id="educationDisplay">
                <div class="education-item">
                    <h3>College</h3>
                    <div id="college_education">
                        @if (!empty($education['college']))
                        @foreach ($education['college'] as $index => $college)
                        <div class="college_education-item">
                            <label for="college_name_{{ $index }}">School Name:</label>
                            <input type="text" id="college_name_{{ $index }}" name="college_education[{{ $index }}][name]" value="{{ $college['name'] }}">

                            <label for="college_course_{{ $index }}">Course/Program:</label>
                            <input type="text" id="college_course_{{ $index }}" name="college_education[{{ $index }}][course]" value="{{ $college['course'] }}">

                            <label for="college_location_{{ $index }}">Location:</label>
                            <input type="text" id="college_location_{{ $index }}" name="college_education[{{ $index }}][location]" value="{{ $college['location'] }}">

                            <label for="college_date_graduated_{{ $index }}">Date Graduated:</label>
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

                            <label for="college_date_graduated_0">Date Graduated:</label>
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
                        @if (!empty($education['senior']))
                        @foreach ($education['senior'] as $index => $senior)
                        <div class="senior_education-item">
                            <label for="senior_name_{{ $index }}">School Name:</label>
                            <input type="text" id="senior_name_{{ $index }}" name="senior_education[{{ $index }}][name]" value="{{ $senior['name'] }}">

                            <label for="senior_course_{{ $index }}">Course/Program:</label>
                            <input type="text" id="senior_course_{{ $index }}" name="senior_education[{{ $index }}][course]" value="{{ $senior['course'] }}">

                            <label for="senior_location_{{ $index }}">Location:</label>
                            <input type="text" id="senior_location_{{ $index }}" name="senior_education[{{ $index }}][location]" value="{{ $senior['location'] }}">

                            <label for="senior_date_graduated_{{ $index }}">Date Graduated:</label>
                            <input type="date" id="senior_date_graduated_{{ $index }}" name="senior_education[{{ $index }}][date_graduated]" value="{{ $senior['date_graduated'] }}">

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

                            <label for="senior_date_graduated_0">Date Graduated:</label>
                            <input type="date" id="senior_date_graduated_0" name="senior_education[0][date_graduated]" value="">

                            <button type="button" class="remove_senior_education">Remove</button>
                        </div>
                        @endif
                    </div>
                    <button type="button" id="add_senior_education" onclick="addSeniorEducation()">Add Another Senior Education</button>

                </div>
                <div class="education-item">
                    <h3>High School</h3>
                    <div id="highschool_education">
                        @if (!empty($education['highschool']))
                        @foreach ($education['highschool'] as $index => $highSchool)
                        <div class="highschool_education-item">
                            <label for="highschool_name_{{ $index }}">School Name:</label>
                            <input type="text" id="highschool_name_{{ $index }}" name="highschool_education[{{ $index }}][name]" value="{{ $highSchool['name'] }}">

                            <label for="highschool_location_{{ $index }}">Location:</label>
                            <input type="text" id="highschool_location_{{ $index }}" name="highschool_education[{{ $index }}][location]" value="{{ $highSchool['location'] }}">

                            <label for="highschool_date_graduated_{{ $index }}">Date Graduated:</label>
                            <input type="date" id="highschool_date_graduated_{{ $index }}" name="highschool_education[{{ $index }}][date_graduated]" value="{{ $highSchool['date_graduated'] }}">

                            <button type="button" class="remove_highschool_education">Remove</button>
                        </div>
                        @endforeach
                        @else
                        <div class="highschool_education-item">
                            <label for="highschool_name_0">School Name:</label>
                            <input type="text" id="highschool_name_0" name="highschool_education[0][name]" value="">

                            <label for="highschool_location_0">Location:</label>
                            <input type="text" id="highschool_location_0" name="highschool_education[0][location]" value="">

                            <label for="highschool_date_graduated_0">Date Graduated:</label>
                            <input type="date" id="highschool_date_graduated_0" name="highschool_education[0][date_graduated]" value="">

                            <button type="button" class="remove_highschool_education">Remove</button>
                        </div>
                        @endif
                    </div>
                    <button type="button" id="add_highschool_education" onclick="addHighSchoolEducation()">Add Another High School Education</button>

                </div>
                <div class="education-item">
                    <h3>Elementary</h3>
                    <div id="elementary_education">
                        @if (!empty($education['elementary']))
                        @foreach ($education['elementary'] as $index => $elementary)
                        <div class="elementary_education-item">
                            <label for="elementary_name_{{ $index }}">School Name:</label>
                            <input type="text" id="elementary_name_{{ $index }}" name="elementary_education[{{ $index }}][name]" value="{{ $elementary['name'] }}">

                            <label for="elementary_course_{{ $index }}">Course/Program:</label>
                            <input type="text" id="elementary_course_{{ $index }}" name="elementary_education[{{ $index }}][course]" value="{{ $elementary['course'] }}">

                            <label for="elementary_location_{{ $index }}">Location:</label>
                            <input type="text" id="elementary_location_{{ $index }}" name="elementary_education[{{ $index }}][location]" value="{{ $elementary['location'] }}">

                            <label for="elementary_date_graduated_{{ $index }}">Date Graduated:</label>
                            <input type="date" id="elementary_date_graduated_{{ $index }}" name="elementary_education[{{ $index }}][date_graduated]" value="{{ $elementary['date_graduated'] }}">

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

                            <label for="elementary_date_graduated_0">Date Graduated:</label>
                            <input type="date" id="elementary_date_graduated_0" name="elementary_education[0][date_graduated]" value="">

                            <button type="button" class="remove_elementary_education">Remove</button>
                        </div>
                        @endif
                    </div>
                    <button type="button" id="add_elementary_education" onclick="addElementaryEducation()">Add Another Elementary Education</button>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="section-header">
                <h2 class="section-title">Skills</h2>
            </div>
            <div id="additional-skills" style="display: flex;gap:0.5em;flex-wrap:wrap;">
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
            <script>
                function removeSkill(button) {
                    button.parentElement.remove();
                }
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

                            <label for="college_date_graduated_${index}">Date Graduated:</label>
                            <input type="date" id="college_date_graduated_${index}" name="college_education[${index}][date_graduated]" value="">

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

                            <label for="senior_date_graduated_${index}">Date Graduated:</label>
                            <input type="date" id="senior_date_graduated_${index}" name="senior_education[${index}][date_graduated]" value="">

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

                            <label for="highschool_date_graduated_${index}">Date Graduated:</label>
                            <input type="date" id="highschool_date_graduated_${index}" name="highschool_education[${index}][date_graduated]" value="">

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

                            <label for="elementary_date_graduated_${index}">Date Graduated:</label>
                            <input type="date" id="elementary_date_graduated_${index}" name="elementary_education[${index}][date_graduated]" value="">

                            <button type="button" class="remove_elementary_education" onclick="removeEducation(this)">Remove</button>
                        </div>`;
                    document.getElementById('elementary_education').insertAdjacentHTML('beforeend', newElementary);
                }

                function removeEducation(button) {
                    button.parentElement.remove();
                }
            </script>
        </div>
        <button type="button" id="discard">Discard</button>
        <div id="modal" style="position: fixed; top:50%;left:50%; transform:translate(-50%,-50%); background-color: white;
        border-radius: 0.25em; border: 2px solid black; padding:0.5em; display:none;
            ">
            <div style="background:white; padding:2rem; border-radius:8px; text-align:center;">
                <p>Are you sure you want to discard changes?</p>
                <button type="button" onclick="confirmDiscard()">Yes</button>
                <button type="button" onclick="closeModal()">No</button>
            </div>
        </div>

       
        <script>
            function confirmDiscard() {
                window.location.href = '/dashboard/{{$id}}';
            }

            function closeModal() {
                document.getElementById('modal').style.display = 'none';
            }

            document.querySelector('#discard').addEventListener('click', function() {
                document.getElementById('modal').style.display = 'flex';
            });
        </script>
        <button type="submit">Submit</button>
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
    </form>

    @else
    <button onclick="if(confirm('Are you sure you want to edit?')) { window.location.href = window.location.pathname + '?edit=true'; }">Edit </button>
    <button id="add-application">Add Application</button>
    <div>
        <h2>Applications</h2>
        @if (!empty($applications))
        @foreach ($applications as $application)
        <div class="application">
            <img src="{{ $application['company_image'] }}" alt="{{ $application['company_name'] }}" height="50">
            <p><strong>Company:</strong> {{ $application['company_name'] }}</p>
            <p><strong>Status:</strong> {{ $application['status'] }}</p>
            <p><strong>Date:</strong> {{ $application['date'] ?? "" }}</p>
            <form action="/delete_application" method="POST" style="display:inline;">
                @csrf
                <input type="hidden" name="index" value="{{ $loop->index }}">
                <input type="hidden" name="resume_id" value="{{ $id }}">
                <button type="submit" onclick="return confirm('Are you sure you want to delete this application?')">Delete</button>
            </form>
        </div>
        @endforeach
        @endif
    </div>
        <div class="container">
            <div class="header">
                <div class="profile-section">
                    <div class="profile-img-container">
                        <img src="/images/{{$image}}" alt="Profile" id="profileImg" class="profile-img">
                        <label for="imageInput" class="upload-icon">📷</label>
                    </div>
                    <div class="info-section">
                        <h1 id="nameDisplay">{{$name}}</h1>
                        <p id="ageDisplay">Age: {{ \Carbon\Carbon::parse($birthday)->age }}</p>
                        <p id="bdayDisplay">Birthday: {{$birthday}}</p>
                        <p id="addressDisplay">Address: {{$address}}</p>
                        <p id="contactDisplay">Contact: {{$contact}}</p>
                    </div>
                </div>
            </div>
    
            <div class="section">
                <div class="section-header">
                    <h2 class="section-title">Objectives</h2>
                </div>
                <p id="objectivesDisplay">{{$objectives ?? "Not Set"}}</p>
            </div>
    
            <div class="section">
                <div class="section-header">
                    <h2 class="section-title">Education</h2>
                </div>
                <div id="educationDisplay">
                    @if(!empty($education['college']))
                    <div class="education-item">
                        <h3>College</h3>
                        @foreach ($education['college'] as $highschool)
                        <p>{{ $highschool['name'] }}</p>
                        <p>{{ $highschool['course'] }}</p>
                        <p>{{ $highschool['location'] }}</p>
                        <p>{{ $highschool['date_graduated'] }}</p>
                        @if (!$loop->last && count($education['college']) > 1)
                            <br>
                        @endif
                        @endforeach
                    </div>
                    @endif
                    @if(!empty($education['senior']))
                    <div class="education-item">
                        <h3>Senior High School</h3>
                        @foreach ($education['senior'] as $highschool)
                        <p>{{ $highschool['name'] }}</p>
                        <p>{{ $highschool['course'] }}</p>
                        <p>{{ $highschool['location'] }}</p>
                        <p>{{ $highschool['date_graduated'] }}</p>
                        @if (!$loop->last && count($education['senior']) > 1)
                            <br>
                        @endif
                        @endforeach
                    </div>
                    @endif
                    @if(!empty($education['highschool']))
                    <div class="education-item">
                        <h3>High School</h3>
                        @foreach ($education['highschool'] as $highschool)
                        <p>{{ $highschool['name'] }}</p>
                        <p>{{ $highschool['location'] }}</p>
                        <p>{{ $highschool['date_graduated'] }}</p>
                         @if (!$loop->last && count($education['highschool']) > 1)
                            <br>
                        @endif
                        @endforeach
                    </div>
                    @endif
                    @if(!empty($education['elementary']))
                    <div class="education-item">
                        <h3>Elementary</h3>
                        @foreach ($education['elementary'] as $elementary)
                            <p>{{ $elementary['name'] }}</p>
                            <p>{{ $elementary['location'] }}</p>
                            <p>{{ $elementary['date_graduated'] }}</p>
                             @if (!$loop->last && count($education['elementary']) > 1)
                                <br>
                            @endif
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
    
            <div class="section">
                <div class="section-header">
                    <h2 class="section-title">Skills</h2>
                </div>
                <div class="skill-tags" id="skillsDisplay">
                    @if(!empty($skills))
                    <div class="education-item">
                        @foreach ($skills as $skill)
                            <span class="skill-tag">{{$skill}}</span>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @section('modal-content')
            <h1>Add Application</h1>
            <form action="/add_application" method="POST">
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
                <input type="hidden" name="resume_id" value="{{ $id }}">
                <select name="company" id="company">
                    <option value="">Select</option>
                    <option value="Jobstreet" data-image="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQyFaYhPIvmCaPQMMabk0mlaHyAGnofey1JAQ&s">Jobstreet</option>
                    <option value="LinkedIn" data-image="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRokEYt0yyh6uNDKL8uksVLlhZ35laKNQgZ9g&s">LinkedIn</option>
                    <option value="other">Other</option>
                </select>

                <label for="company_name">Name:</label>
                <input type="text" id="company_name" name="company_name" value="">
                <div>
                    <label for="company_image">Image URL:</label>
                    <input type="text" id="company_image" name="company_image" oninput="previewApplicationImageUrl(event)">
                    <img id="application_image_preview" src="#" alt="Application Image Preview" style="display:none;" height="50">
                </div>
                <script>
                    function previewApplicationImageUrl(event) {
                        const url = event.target.value;
                        const output = document.getElementById('application_image_preview');
                        if (url) {
                            output.src = url;
                            output.style.display = 'block';
                        } else {
                            output.style.display = 'none';
                        }
                    }
                </script>
                <script>
                    const companySelect = document.getElementById('company');
                    const nameInput = document.getElementById('company_name');
                    const imageInput = document.getElementById('company_image');
                    const imagePreview = document.getElementById('application_image_preview');

                    companySelect.addEventListener('change', function() {
                        const selectedOption = companySelect.options[companySelect.selectedIndex];
                        if (selectedOption.value === 'other' || !selectedOption.value) {
                            nameInput.value = '';
                            imageInput.value = '';
                            imagePreview.style.display = 'none';
                        } else {
                            nameInput.value = selectedOption.value;
                            imageInput.value = selectedOption.getAttribute('data-image');
                            imagePreview.src = selectedOption.getAttribute('data-image');
                            imagePreview.style.display = 'block';
                        }
                    });
                </script>
                <label for="status">Status</label>
                <select id="status" name="status" onchange="toggleCustomStatus(this)">
                    <option value="hired">Hired</option>
                    <option value="interview">Interview</option>
                    <option value="applied">Applied</option>
                    <option value="other">Other</option>
                </select>
                <input type="text" id="custom_status" name="custom_status" style="display:none;" placeholder="Enter custom status">

                <script>
                    function toggleCustomStatus(select) {
                        var customStatusInput = document.getElementById('custom_status');
                        if (select.value === 'other') {
                            customStatusInput.style.display = 'block';
                        } else {
                            customStatusInput.style.display = 'none';
                        }
                    }
                </script>

                <label for="date">Date</label>
                <input type="date" id="date" name="date" value="{{ date('Y-m-d') }}">

                <button type="button" class="close">Close</button>
                <button type="submit">Submit</button>
            </form>
        @endsection
        @include('layouts.modal')
        <script>
            document.querySelector('#add-application').addEventListener('click', function() {
                document.querySelector('.modal').style.display = 'block';

                document.querySelector('.modal .close').addEventListener('click', function() {
                document.querySelector('.modal').style.display = 'none';
                });
            });
        </script>
    @endif
</body>

</html>