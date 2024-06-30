<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{   
    public function index(Request $request)
    {
        $students = Student::all();
        $query = Student::query();

        // Sorting
        if ($request->has('sort')) {
            $sortField = $request->input('sort');
            $query->orderBy($sortField);
        }

        // Searching
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('firstname', 'like', "%$searchTerm%")
                  ->orWhere('lastname', 'like', "%$searchTerm%");
            });
        }

        // Limit and Offset
        $limit = $request->input('limit', 10);
        $offset = $request->input('offset', 0);
        $query->limit($limit)->offset($offset);

        // Fields selection
        if ($request->has('fields')) {
            $fields = explode(',', $request->input('fields'));
            $query->select($fields);
        }

        // Filter by year
        if ($request->has('year')) {
            $query->where('year', $request->input('year'));
        }

        // Filter by course
        if ($request->has('course')) {
            $query->where('course', $request->input('course'));
        }

        // Filter by section
        if ($request->has('section')) {
            $query->where('section', $request->input('section'));
        }

        $students = $query->get();

        return response()->json($students);
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'birthdate' => 'required|date_format:Y-m-d',
            'sex' => 'required|in:MALE,FEMALE',
            'address' => 'required|string',
            'year' => 'required|integer',
            'course' => 'required|string',
            'section' => 'required|string',
        ]);

        $student = Student::create($request->all());

        return response()->json($student, 201);
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);

        return response()->json($student);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'string',
            'lastname' => 'string',
            'birthdate' => 'date_format:Y-m-d',
            'sex' => 'in:MALE,FEMALE',
            'address' => 'string',
            'year' => 'integer',
            'course' => 'string',
            'section' => 'string',
        ]);

        $student = Student::findOrFail($id);
        $student->update($request->all());

        return response()->json($student, 200);
    }

    
    
}
