<?php

namespace App\Http\Controllers;

use App\Models\StudentInfo;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students = StudentInfo::all();
        return Inertia::render('ViewStudent',['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, StudentInfo $studentInfo)
    {
        //
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
        ]);
        //save method to db
        $studentInfo = new StudentInfo();
        $studentInfo->fname = $request->input('fname');
        $studentInfo->lname = $request->input('lname');

        // Save the data to the database
        $studentInfo->save();
        return redirect('/students');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentInfo $student)
    {
        //
        // dd('delete');
        $student->delete();
        // return response()->json(['message' => 'Deleted successfully'], 201);
    }
}
