<?php

namespace App\Http\Controllers;

use domain\Facade\StudentFacade;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $response['students'] = StudentFacade::all();
        return view('pages.home')->with($response);
    }
    public function create()
    {
        return view('pages.add_new_student');
    }

    public function store(Request $request)
    {
        StudentFacade::store($request);
        return redirect()->route('home');
    }

    public function edit(Request $request)
    {
        $response['student'] = StudentFacade::edit($request);
        return view('pages.edit_student')->with($response);
    }

    public function update(Request $request)
    {
        StudentFacade::update($request);
        return redirect()->route('home');
    }

    public function delete(Request $request)
    {
        StudentFacade::delete($request);
        return redirect()->route('home');
    }
}
