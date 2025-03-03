<?php

namespace App\Http\Controllers\api;

use App\Models\Student;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class StudentController extends Controller
{
 
    
    public function index(){

        $students = Student::get();
        if($students -> count() > 0){
            return StudentResource::collection($students);
        }else{
            return response()->json(['message' => 'No record available'], 200);
        }
    }

    public function store(Request $req){

        //validate data

        $validator = validator::make($req ->all(),[
            'name' => 'required|string',
            'email' => 'required|email|unique:students,email',
            'phone' => 'nullable|string',
            'dob' => 'nullable|date',
            'address' => 'nullable|string',
        ]);

        // If validation fails, return the errors

        if($validator->fails()){
            return response()->json([
                'massage' => 'all files are mendatory ',
                'error' => $validator ->messages(),
            ], 422);
        }

        // create data 

        $req = Student::create([
            'name' => $req->name,
            'email' => $req->email,
            'phone' => $req->phone,
            'dob' => $req->dob,
            'address' => $req->address,
        ]);

        // Return created data

        return response()->json([
            'massage' => 'student added successfully',
            'data' => new StudentResource($req )
        ],200);
    }



    public function show(Student $id){

        //show data by id
        return new StudentResource($id);

    }

    public function update(Request $request, Student $id){

        // Validate incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:students,email,',
            'phone' => 'nullable|string',
            'dob' => 'nullable|date',
            'address' => 'nullable|string',
        ]);

        // If validation fails, return errors massage
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'error' => $validator->messages(),
            ], 422);
        }

        // Update data
        $id->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'address' => $request->address,
        ]);

        // Return updated data
        return response()->json([
            'message' => 'Student updated successfully',
            'data' => new StudentResource($id),
        ], 200);
    }


    public function destroy(Student $student){
        $student ->delete();
        return response()->json([
            'message' => 'Student Deleted successfully',
        ], 200);
    }
}
