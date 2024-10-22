<?php

namespace domain\Services;

use App\Models\student;
use Illuminate\Http\Request;


class StudentService
{

    public function all()
    {
        // $response['students'] = student::all();
        // return $response;
        return student::all();

    }

    public function create()
    {
        return view('pages.add_new_student');
    }
    public function store($request) //request wenuwata data wage ekk danna. wenas karanna kammeli nisa mehema demme
    {
        $name = $request->name;
        $email = $request->email;
        $image = $request->image;
        $dob = $request->dob;
        $gender = $request->gender;

        $image_name = date('Ymd') . time() . $image->getClientoriginalName();
        $image->move(public_path('Images'), $image_name);

        student::create([
            'name' => $name,
            'email' => $email,
            'image' => $image_name,
            'dob' => $dob,
            'gender' => $gender,
        ]);

        return;
    }

    public function edit(Request $request)
    {
        $id = $request->student_id;
        return student::find($id);
    }

    public function update(Request $request)
    {
        // Retrieve data from the request
        $id = $request->student_id;
        $name = $request->name;
        $email = $request->email;
        $dob = $request->dob;
        $gender = $request->gender;
        $old_image_name = $request->old_image_name;

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_name = date('Ymd') . time() . $image->getClientOriginalName();
            $image->move(public_path('Images'), $image_name);

            $image_path = public_path('Images/' . $old_image_name);
            unlink($image_path);

        } else {
            // If no new image, retain the old image name
            $image_name = $old_image_name;
        }

        // Update the student record
        $student = student::find($id);
        $student->name = $name;
        $student->email = $email;
        $student->image = $image_name;
        $student->dob = $dob;
        $student->gender = $gender;
        $student->update();

        // Redirect to home after update
        return;
    }

    public function delete(Request $request)
    {
        $id = $request->student_id;

        $student = student::find($id);
        $image_name = $student->image;

        $student->delete();

        $image_path = public_path('Images/' . $image_name);
        unlink($image_path);

        return;
    }
}
