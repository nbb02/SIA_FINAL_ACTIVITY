<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <h1 style="color:green;text-align:center;">Edit mode is enabled.</h1>
    <button onclick="if(confirm('Are you sure you want to remove the edit parameter?')) { window.location.href = window.location.pathname; }">Discard</button>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form class="resume" action="/dashboard" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="_image">Image:</label>
            <input type="file" id="_image" name="_image" value="{{ old('_image') }}" onchange="previewImage(event)">
            <img id="image_preview" src="/images/{{ $image }}" alt="Profile Picture" height="50">
        </div>
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $name) }}">
        </div>
        <div>
            <label for="birthday">Birthday:</label>
            <input type="date" id="birthday" name="birthday" value="{{ old('birthday', $birthday) }}">
        </div>
        <div>
            <label for="contact">Contact:</label>
            <input type="text" id="contact" name="contact" value="{{ old('contact', $contact) }}">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email', $email) }}">
        </div>
        <div>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="{{ old('address', $address) }}">
        </div>
        <script>
            function previewImage(event) {
                var reader = new FileReader();
                reader.onload = function() {
                    var output = document.getElementById('image_preview');
                    output.src = reader.result;
                }
                reader.readAsDataURL(event.target.files[0]);
            }
        </script>

        <div>
            <h1>Education</h1>
            <div>
                <div>
                    <h2>College</h2>
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
                <div>
                    <h2>High School</h2>
                    <div id="highschool_education">
                        @if (old('highschool_education'))
                        @foreach (old('highschool_education', []) as $index => $highSchool)
                        <div class="highschool_education-item">
                            <label for="highschool_name_{{ $index }}">School Name:</label>
                            <input type="text" id="highschool_name_{{ $index }}" name="highschool_education[{{ $index }}][name]" value="{{ $highSchool['name'] }}">

                            <label for="highschool_course_{{ $index }}">Course/Program:</label>
                            <input type="text" id="highschool_course_{{ $index }}" name="highschool_education[{{ $index }}][course]" value="{{ $highSchool['course'] }}">

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

                            <label for="highschool_course_0">Course/Program:</label>
                            <input type="text" id="highschool_course_0" name="highschool_education[0][course]" value="">

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
                <div>
                    <h2>Elementary</h2>
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
        <div>
            <label for="skills">Skills:</label>
            <input type="text" id="skills" name="skills[]" value="{{ old('skills.0') }}">
            <div id="additional-skills">
                @foreach (old('skills', []) as $index => $skill)
                @if ($index > 0)
                <input type="text" name="skills[]" value="{{ $skill }}">
                @endif
                @endforeach
            </div>
            <button type="button" onclick="addSkill()">Add another skill</button>

        </div>
        <button type="submit">Submit</button>
    </form>
    @else
    <button onclick="if(confirm('Are you sure you want to edit?')) { window.location.href = window.location.pathname + '?edit=true'; }">Edit </button>
    <button id="add-application">Add Application</button>
    <div class="resume">
        <div>
            <h2>Applications</h2>
            @if (!empty($applications))
            @foreach ($applications as $application)
            <div class="application">
                <img src="{{ $application['company_image'] }}" alt="{{ $application['company_name'] }}" height="50">
                <p><strong>Company:</strong> {{ $application['company_name'] }}</p>
                <p><strong>Status:</strong> {{ $application['status'] }}</p>
                @if(isset($application['date']))
                <p><strong>Date:</strong> {{ $application['date'] }}</p>
                @endif
            </div>
            @endforeach
            @endif
        </div>
        <h1>{{ $name }}</h1>
        <img src="/images/{{ $image }}" alt="Profile Picture" height="50">
        <p><strong>Birthday:</strong> {{ $birthday }}</p>
        <p><strong>Contact:</strong> {{ $contact }}</p>
        <p><strong>Email:</strong> {{ $email }}</p>
        <p><strong>Address:</strong> {{ $address }}</p>

        <h2>Education</h2>
        @if(isset($education['college']))
        <h3>College</h3>
        @foreach ($education['college'] as $college)
        <p><strong>Name:</strong> {{ $college['name'] }}</p>
        <p><strong>Course:</strong> {{ $college['course'] }}</p>
        <p><strong>Location:</strong> {{ $college['location'] }}</p>
        <p><strong>Date Graduated:</strong> {{ $college['date_graduated'] }}</p>
        @endforeach
        @endif

        @if(isset($education['highschool']))
        <h3>High School</h3>
        @foreach ($education['highschool'] as $highschool)
        <p><strong>Name:</strong> {{ $highschool['name'] }}</p>
        @if(isset($highschool['course']))
        <p><strong>Course:</strong> {{ $highschool['course'] }}</p>
        @endif
        <p><strong>Location:</strong> {{ $highschool['location'] }}</p>
        <p><strong>Date Graduated:</strong> {{ $highschool['date_graduated'] }}</p>
        @endforeach
        @endif

        @if(isset($education['elementary']))
        <h3>Elementary</h3>
        @foreach ($education['elementary'] as $elementary)
        <p><strong>Name:</strong> {{ $elementary['name'] }}</p>
        <p><strong>Course:</strong> {{ $elementary['course'] }}</p>
        <p><strong>Location:</strong> {{ $elementary['location'] }}</p>
        <p><strong>Date Graduated:</strong> {{ $elementary['date_graduated'] }}</p>
        @endforeach
        @endif

        <h2>Skills</h2>
        <ul>
            @foreach ($skills as $skill)
            <li>{{ $skill }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @section('modal-content')
    <h1>ADd Application</h1>

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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.remove_college_education').forEach(function(button) {
                button.addEventListener('click', function() {
                    removeEducation(button);
                });
            });

            document.querySelectorAll('.remove_high_school_education').forEach(function(button) {
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
            var newSkill = document.createElement('input');
            newSkill.type = 'text';
            newSkill.name = 'skills[]';
            document.getElementById('additional-skills').appendChild(newSkill);
        }

        function addCollegeEducation() {
            var index = document.querySelectorAll('.college_education-item').length;
            var newCollege = `
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

        function addHighSchoolEducation() {
            var index = document.querySelectorAll('.high_school_education-item').length;
            var newHighSchool = `
                        <div class="high_school_education-item">
                            <label for="high_school_name_${index}">School Name:</label>
                            <input type="text" id="high_school_name_${index}" name="high_school_education[${index}][name]" value="">

                            <label for="high_school_course_${index}">Course/Program:</label>
                            <input type="text" id="high_school_course_${index}" name="high_school_education[${index}][course]" value="">

                            <label for="high_school_location_${index}">Location:</label>
                            <input type="text" id="high_school_location_${index}" name="high_school_education[${index}][location]" value="">

                            <label for="high_school_date_graduated_${index}">Date Graduated:</label>
                            <input type="date" id="high_school_date_graduated_${index}" name="high_school_education[${index}][date_graduated]" value="">

                            <button type="button" class="remove_high_school_education" onclick="removeEducation(this)">Remove</button>
                        </div>`;
            document.getElementById('high_school_education').insertAdjacentHTML('beforeend', newHighSchool);
        }

        function addElementaryEducation() {
            var index = document.querySelectorAll('.elementary_education-item').length;
            var newElementary = `
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
</body>

</html>