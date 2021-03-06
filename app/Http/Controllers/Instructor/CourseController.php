<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Level;
use App\Models\Price;
use App\Models\Tag;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class CourseController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:Crear cursos')->only('index');
        $this->middleware('can:Leer cursos')->only('create', 'store');
        $this->middleware('can:Actualizar cursos')->only('edit', 'update', 'goals');
        $this->middleware('can:Elimiar cursos')->only('destroy');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('instructor.courses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();
        $levels = Level::pluck('name', 'id');
        $prices = Price::pluck('name', 'id');

        return view('instructor.courses.create', compact('categories', 'levels', 'prices', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:courses',
            'category_id' => 'required',
            'date' => 'required',
            'time' => 'required',
            'price' => 'required',
            'level_id' => 'required',
            'price_id' => 'nullable',
            'file' => 'image'
        ]);

        $course = Course::create($request->all());

        if ($request->file != null) {
            $data = $request->file;

            $file = file_get_contents($request->file);
            $info = $data->getClientOriginalExtension();
            $extension = explode('img/courses', mime_content_type('img/courses'))[0];
            $image = Image::make($file);
            $fileName = rand(0, 10) . "-" . date('his') . "-" . rand(0, 10) . "." . $info;
            $path  = 'img/courses';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $img = $path . '/' . $fileName;

            if ($image->save($img)) {
                $requestData['file'] = $img;
                $course = Course::create($request->all());
                $course->image()->create([
                    'url' => $img
                ]);
                // $mensaje = "Producto Registrado correctamente";
            } else {
                // $mensaje = "Error al guardar la imagen";
            }
        }
        return redirect()->route('instructor.courses.edit', $course);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('instructor.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $this->authorize('dictated', $course);
        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();
        $levels = Level::pluck('name', 'id');
        $prices = Price::pluck('name', 'id');
        return view('instructor.courses.edit', compact('course', 'categories', 'levels', 'prices', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $this->authorize('dictated', $course);

        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:courses,slug,' . $course->id,
            'date' => 'required',
            'time' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'level_id' => 'required',
            'price_id' => 'nullable',
            'file' => 'image'
        ]);

        $course->update($request->all());

        if ($request->file('file')) {
            $url = Storage::put('public/courses', $request->file('file'));
            if ($course->image) {
                Storage::delete($course->image->url);

                $course->image->update([
                    'url' => $url
                ]);
            }else{
                $course->image()->create([
                    'url' => $url
                ]);
            }
        }

        if($request->tags){
            $course->tags()->sync($request->tags);
        }

        return redirect()->route('instructor.courses.edit', $course);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
    public function goals(Course $course)
    {
        $this->authorize('dictated', $course);

        return view('instructor.courses.goals', compact('course'));
    }

    public function status(Course $course)
    {
        $course->status = 2;
        $course->save();

        if ($course->observation) {
            $course->observation->delete();
        }

        return redirect()->route('instructor.courses.edit', $course);
    }
    public function observation(Course $course){
        return view('instructor.courses.observation', compact('course'));
    }
}
