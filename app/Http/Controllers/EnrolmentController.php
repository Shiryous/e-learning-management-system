<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrolment;

use Validator;

class EnrolmentController extends Controller
{
    public function enrolments(){
        $enrolments = Enrolment::all();

        $data = [
            'status' =>200,
            'course' =>$enrolments,
        ];
    
        return response()->json($data, 200);
    }

    public function new_enrolment(Request $request){
        $validator = Validator::make($request->all(),
        [
            'student_id'=>'required',
            'course_id'=>'required',
            'status'=>'required',
            'enrollment_date'=>'required',
            'completion_date'=>'required', 
            'grade'=>'required', 
        ]);

        if($validator->fails()){

            $data = [
                'status'=>422,
                'message'=>$validator->messages()
            ];

            return response()->json($data, 422);
        }
        else{
            $enrolment = new Enrolment;

            $enrolment->student_id=$request->student_id;
            $enrolment->course_id=$request->course_id;
            $enrolment->status=$request->status;
            $enrolment->enrollment_date=$request->enrollment_date;
            $enrolment->completion_date=$request->completion_date;
            $enrolment->grade=$request->grade;

            $enrolment->save();

            $data = [
                'status'=>200,
                'message'=>'Enrolment created successfully!',
            ];

            return response()->json($data, 200);
        }
    }

    public function retrieve_enrolment($id){
        $enrolment = Enrolment::find($id);

        $data = [
            'status' => 200,
            'enrolment' => $enrolment,
        ];

        return response()->json($data, 200);
    }

    public function update_enrolment(Request $request, $id){
        $validator = Validator::make($request->all(),
        [
            'student_id'=>'required',
            'course_id'=>'required',
            'status'=>'required',
            'enrollment_date'=>'required',
            'completion_date'=>'required', 
            'grade'=>'required', 
        ]);

        if($validator->fails()){

            $data = [
                'status'=>422,
                'message'=>$validator->messages()
            ];

            return response()->json($data, 422);
        }
        else{
            $enrolment = Enrolment::find($id);

            $enrolment->student_id=$request->student_id;
            $enrolment->course_id=$request->course_id;
            $enrolment->status=$request->status;
            $enrolment->enrollment_date=$request->enrollment_date;
            $enrolment->completion_date=$request->completion_date;
            $enrolment->grade=$request->grade;

            $enrolment->save();

            $data = [
                'status'=>200,
                'message'=>'Enrolment updated succesfully!',
            ];

            return response()->json($data, 200);
        }
    }

    public function purge($id){
        $enrolment = Enrolment::find($id);

        $enrolment->delete();

        $data = [
            'status'=>200,
            'message'=>'Enrolment deleted successfully'
        ];

        return response()->json($data, 200);
    }
}
