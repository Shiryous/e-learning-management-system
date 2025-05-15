<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Traits\ApiResponses;

use Validator;

class CourseController extends Controller
{   
    use ApiResponses;

    public function courses(){
        $courses = Course::all();

        $data = [
            'status' =>200,
            'course' =>$courses,
        ];
    
        return response()->json($data, 200);
    }
    
    public function new_course(Request $request){
        $validator = Validator::make($request->all(),
        [
            'title'=>'required',
            'description'=>'required',
            'lecture_hours'=>'required',
            'start_date'=>'required',
            'end_date'=>'required', 
        ]);

        if($validator->fails()){

            $data = [
                'status'=>422,
                'message'=>$validator->messages()
            ];

            return response()->json($data, 422);
        }
        else{
            $course = new Course;

            $course->title=$request->title;
            $course->description=$request->description;
            $course->lecture_hours=$request->lecture_hours;
            $course->start_date=$request->start_date;
            $course->end_date=$request->end_date;
            
            $course->save();

            $data = [
                'status'=>200,
                'message'=>'Course created succesfully!',
            ];

            return response()->json($data, 200);
        }
    }

    public function retrieve_course($id){
        $course = Course::find($id);

        $data = [
            'status' => 200,
            'course' => $course,
        ];

        return response()->json($data, 200);
    }

    public function update_course(Request $request, $id){
        $validator = Validator::make($request->all(),
        [
            'title'=>'required',
            'description'=>'required',
            'lecture_hours'=>'required',
            'start_date'=>'required',
            'end_date'=>'required', 
        ]);

        if($validator->fails()){

            $data = [
                'status'=>422,
                'message'=>$validator->messages()
            ];

            return response()->json($data, 422);
        }
        else{
            $course = Course::find($id);

            $course->title=$request->title;
            $course->description=$request->description;
            $course->lecture_hours=$request->lecture_hours;
            $course->start_date=$request->start_date;
            $course->end_date=$request->end_date;
            
            $course->save();

            $data = [
                'status'=>200,
                'message'=>'Course updated succesfully!',
            ];

            return response()->json($data, 200);
        }
    }

    public function purge($id){
        $course = Course::find($id);

        $course->delete();

        $data = [
            'status'=>200,
            'message'=>'Course deleted successfully'
        ];

        return response()->json($data, 200);
    }
}
