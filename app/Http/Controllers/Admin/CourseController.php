<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ApprovedCourse;
use App\Mail\RejectCourse;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class CourseController extends Controller
{
    public function index(){

        $courses = Course::where('status', 2)->paginate(10);

        return view('admin.courses.index', compact('courses'));
    }

    public function show(Course $course){
        $this->authorize('revision', $course);
        return view('admin.courses.show', compact('course'));
    }

    public function approved(Course $course){
        $this->authorize('revision', $course);

        // Condiciones para aprobar curso
        if (!$course->lessons || !$course->goals || !$course->requirements || !$course->image) {
            return back()->with('info', 'No se puede publicar un evento que no este completo');
        }
        $course->status = 3;
        $course->save();

        //Envio de correo
        $mail = new ApprovedCourse($course);
        Mail::to($course->teacher->email)->queue($mail);

        return redirect()->route('admin.courses.index')->with('info' , 'El evento fue publicado correctamente');
    }
    public function observation(Course $course){
        return view('admin.courses.observation', compact('course'));
    }

    public function reject(Request $request, Course $course){
        
        $request->validate([
            'body' => 'required'
        ]);

        $course->observation()->create($request->all()); 
        
        $course->status = 1;
        $course->save();

        //Envio de correo
        $mail = new RejectCourse($course);
        Mail::to($course->teacher->email)->queue($mail);

        return redirect()->route('admin.courses.index')->with('info' , 'El evento fue rechazado!');
    }  
}
