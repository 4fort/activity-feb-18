<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\View\Components\Table;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $columns = [
            ['key' => 'id', 'label' => 'ID'],
            ['key' => 'name', 'label' => 'Name'],
            ['key' => 'email', 'label' => 'Email'],
            ['key' => 'dob', 'label' => 'Date of Birth'],
        ];

        $students = Student::paginate(10);

        $rows = $students->map(function ($student) {
            return [
                'id' => $student->id,
                'name' => $student->name,
                'email' => $student->email,
                'dob' => $student->dob,
            ];
        })->toArray();

        $table = new Table($columns, $rows);

        return view('students.index', compact('table', 'students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request) {}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:2',
            'email' => 'required|email',
            'dob' => 'required|date'
        ]);

        try {
            $student = new Student();
            $student->name = $validatedData['name'];
            $student->email = $validatedData['email'];
            $student->dob = $validatedData['dob'];
            $student->save();
            return back()->with('success', "Student added successfully");
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Something went wrong! ' . $e->getMessage()])->withInput();
        }
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
    public function destroy(string $id)
    {
        //
    }

    public function search(Request $request)
    {
        $search = $request->get('search');

        $students = Student::where('name', 'like', "%{$search}%")->orWhere('email', 'LIKE', '%{$search}%')->paginate(10);

        $columns = [
            ['key' => 'id', 'label' => 'ID'],
            ['key' => 'name', 'label' => 'Name'],
            ['key' => 'email', 'label' => 'Email'],
            ['key' => 'dob', 'label' => 'Date of Birth'],
        ];

        $rows = $students->map(function ($student) {
            return [
                'id' => $student->id,
                'name' => $student->name,
                'email' => $student->email,
                'dob' => $student->dob,
            ];
        })->toArray();

        $table = new Table($columns, $rows);

        return view('students.index', compact('table', 'students'));
    }
}
