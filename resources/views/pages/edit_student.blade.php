@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card mt-5">
                    <div class="card-header fw-bold text-center">
                        Add new student
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update_student') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="old_image_name" value="{{$student->image}}">
                            <input type="hidden" name="student_id" value="{{$student->id}}">

                            <div class="form-group">

                                <!--Avatar-->
                                <div>
                                    <div class="d-flex justify-content-center mb-4">
                                        <img id="selectedAvatar"
                                            src="{{ asset('Images/' . $student->image) }}"
                                            class="rounded-circle" style="width: 200px; height: 200px; object-fit: cover;"
                                            alt="example placeholder" />
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <div data-mdb-ripple-init class="btn btn-primary btn-rounded">
                                            <label class="form-label text-white m-1" for="customFile2">Add New Profile
                                                Image</label>
                                            <input type="file" class="form-control d-none " id="customFile2"
                                                onchange="displaySelectedImage(event, 'selectedAvatar')" name="image" />
                                        </div>
                                    </div>
                                </div>

                                <label for="name" class="mt-3">Name</label>
                                <input type="text" name="name" class="form-control mb-2 " value="{{ $student->name }}"
                                    required>

                                <div class="mt-3 mb-2">
                                    <label for="gender" class="me-3">Gender</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1"
                                            value="male" required @if ($student->gender == 'male') checked @endif>

                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2"
                                            value="female" required @if ($student->gender == 'female') checked @endif>
                                        <label class="form-check-label" for="inlineRadio2">Female</label>
                                    </div>
                                    <br>
                                </div>


                                <label for="dob">Date of Birth</label>
                                <input type="date" name="dob" class="form-control mb-2" value="{{ $student->dob }}"
                                    required>

                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control mb-2" value="{{ $student->email }}"
                                    required>

                            </div>

                            <div class="d-flex justify-content-end mt-4">
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="{{ route('home') }}" class="btn btn-danger ms-2">Skip</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
    </style>
@endpush

@push('js')
    <script>
        function displaySelectedImage(event, elementId) {
            const selectedImage = document.getElementById(elementId);
            const fileInput = event.target;

            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    selectedImage.src = e.target.result;
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    </script>
@endpush
