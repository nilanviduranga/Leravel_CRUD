@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <div class="row fw-bold text-center">
                            <div class="col-10">
                                Registered Students
                            </div>
                            <div class="col-2 fw-bold text-center">
                                <a href="{{ route('add_new_student') }}" class="btn btn-success btn-sm">Add New Student</a>
                            </div>
                        </div>
                    </div>

                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">DOB</th>
                                <th scope="col">Email</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">

                            @foreach ($students as $key => $student)
                                <!-- Static data for illustration -->
                                <tr>
                                    <th scope="row">{{ ++$key }}</th>
                                    <td>
                                        <img src="{{ asset('Images/' . $student->image) }}" class="rounded-circle"
                                            style="width: 50px; height: 50px; object-fit: cover;"
                                            alt="{{ $student->image }}" />
                                    </td>

                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->dob }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->gender }}</td>
                                    <td>
                                        <form action="{{route('edit_student')}}" method="POST" style="display:inline;" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="student_id" value="{{ $student->id }}">
                                            <button type="submit" class="btn p-0" title="Edit">
                                                <i class="bi bi-pencil-fill text-black fw-bold me-2"></i>
                                            </button>
                                        </form>

                                        <form action="{{route('delete_student')}}" method="POST" style="display:inline;"
                                            onsubmit="return confirm('Are you sure you want to delete this student?');" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="student_id" value="{{ $student->id }}">
                                            <button type="submit" class="btn p-0" title="Delete">
                                                <i class="bi bi-trash-fill text-black fw-bold"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <!-- You can duplicate or dynamically populate rows here -->
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
    </style>
@endpush
