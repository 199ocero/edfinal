<?php

namespace App\Http\Controllers\Instructor;

use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SecController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = auth()->user();
        $user = $user->role;
        if($user=='instructor'){
            $student = Student::where('section_id',$id)->latest()->get();
            $response = [
                'message' => 'Fetch specific student successfully!',
                'data' => $student,
            ];

            return response($response,200);
        }else{
            $response = [
                'message' => 'User unauthorized.',
            ];
            return response($response,401);
        }
    }
    public function showSection($id){
        $user = auth()->user();
        $user = $user->role;
        if($user=='instructor'){
            $section = Section::find($id);
        $response = [
            'message' => 'Fetch specific section successfully!',
            'data' => $section,
        ];

        return response($response,200);
        }else{
            $response = [
                'message' => 'User unauthorized.',
            ];
            return response($response,401);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
