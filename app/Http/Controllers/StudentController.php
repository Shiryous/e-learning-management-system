<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Validator;

class StudentController extends Controller
{
    public function all_students(){
        $students = Student::all();

        $data = [
            'status' =>200,
            'student' =>$students,
        ];
    
        return response()->json($data, 200);
    }

    public function new_student(Request $request){
        $validator = Validator::make($request->all(),
            [
                'name'=>'required',
                'surname'=>'required',
                'birth_date'=>'required',
                'email'=>'required|email',
                'father_name'=> 'required',
            ]
            );

        if($validator->fails()){

            $data = [
                'status'=>422,
                'message'=>$validator->messages()
            ];

            return response()->json($data, 422);
        }
        else
        {
            $student = new Student;

            $student->name=$request->name;
            $student->surname=$request->surname;
            $student->birth_date=$request->birth_date;
            $student->entry_date=now()->format('Y-m-d');
            $student->email=$request->email;
            $student->father_name=$request->father_name;

            $student->save();

            $data = [
                'status'=>200,
                'message'=>'Student created succesfully!',
            ];

            return response()->json($data, 200);
        }
    }

    public function retrieve_student($id){
        $student = Student::find($id);

        $data = [
            'status' => 200,
            'student' => $student,
        ];

        return response()->json($data, 200);
    }

    public function update_student(Request $request, $id){
        $validator = Validator::make($request->all(),
            [
                'name'=>'required',
                'surname'=>'required',
                'birth_date'=>'required',
                'email'=>'required|email',
                'father_name'=> 'required',
            ]
            );

        if($validator->fails()){

            $data = [
                'status'=>422,
                'message'=>$validator->messages()
            ];

            return response()->json($data, 422);
        }
        else
        {
            $student = Student::find($id);

            $student->name=$request->name;
            $student->surname=$request->surname;
            $student->birth_date=$request->birth_date;
            $student->entry_date=now()->format('Y-m-d');
            $student->email=$request->email;
            $student->father_name=$request->father_name;

            $student->save();

            $data = [
                'status'=>200,
                'message'=>'Student updated succesfully!',
            ];

            return response()->json($data, 200);
        }
    }

    public function purge($id){
        $student = Student::find($id);

        $student->delete();

        $data = [
            'status'=>200,
            'message'=>'Student deleted successfully'
        ];

        return response()->json($data, 200);
    }
}
