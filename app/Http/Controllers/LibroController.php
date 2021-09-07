<?php

namespace App\Http\Controllers;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['libros'] = Libro::paginate(5);
        return view('libro.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('libro.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosLibro = request()->except('_token');
        if($request->hasFile('imagen')){
            $datosLibro['imagen'] = $request->file('imagen')->store('uploads','public');
        }
        Libro::insert($datosLibro);
        //return response()->json($datosLibro);
        return redirect('libro')->with('mensaje','Usuario creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $libro = Libro::findOrFail($id);
        return view('libro.editar', compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosLibro = request()->except(['_token','_method']);

        if($request->hasFile('imagen')){
            $libro = Libro::findOrFail($id);
            Storage::delete('public/'.$libro->imagen);
            $datosLibro['imagen'] = $request->file('imagen')->store('uploads','public');
        }
        
        Libro::where('id','=',$id)->update($datosLibro);
        $libro = Libro::findOrFail($id);
        return view('libro.editar', compact('libro'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {

        $libro = Libro::findOrFail($id);
        if(Storage::delete('public/'.$libro->imagen)){
            Libro::destroy($id);
        }

        return redirect('libro')->with('mensaje','Usuario eliminado correctamente');
    }
}
