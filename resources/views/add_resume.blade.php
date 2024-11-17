<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="/dashboard" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="_image">Image:</label>
            <input type="file" id="_image" name="_image" value="{{ old('_image') }}">
        </div>
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
        </div>
        <div>
            <label for="birthday">Birthday:</label>
            <input type="date" id="birthday" name="birthday" value="{{ old('birthday') }}">
        </div>
        <div>
            <label for="contact">Contact:</label>
            <input type="text" id="contact" name="contact" value="{{ old('contact') }}">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
        </div>
        <div>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="{{ old('address') }}">
        </div>
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
        </div>
        <button type="submit">Submit</button>
    </form>
</body>

</html>