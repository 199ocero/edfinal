<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Irregular;
use Illuminate\Http\Request;

class IrregController extends Controller
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
        $user = auth()->user();
        $user = $user->role;
        if($user=='instructor'){
            
            $data = $request->validate([
                'student_id' => 'required',
                'instructor_id' => 'required',
                'section_id' => 'required',
                'subject_id' => 'required', 
            ]);
           
            $irreg = Irregular::create([
                'student_id' => $data['student_id'],
                'instructor_id' => $data['instructor_id'],
                'section_id' => $data['section_id'],
                'subject_id' => $data['subject_id'],
            ]);
            $response = [
                'message' => 'Irregular student created successfully!',
                'data' => $irreg,
            ];

            return response($response,201);
            
        }else{
            $response = [
                'message' => 'User unauthorized.',
            ];
            return response($response,401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
