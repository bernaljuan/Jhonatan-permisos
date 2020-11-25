<?php

namespace App\Http\Controllers;

use App;
use App\Articulos;
use App\categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticulosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['articulos'] = Articulos::paginate(5);
        $categorias = categorias::all();
        return view('articulos.index', $datos, compact('categorias'));
    }

    public function personal()
    {
        $articulos = Articulos::select('id','Nombre', 'categoria_id', 'foto', 'Precio')
            ->where('categoria_id', '=', 1)
            ->get();
        return view('articulos.personal', compact('articulos'));
    }

    public function familiar()
    {
        $articulos = Articulos::select('Nombre', 'categoria_id', 'foto', 'Precio')
            ->where('categoria_id', '=', 2)
            ->get();
        return view('articulos.familiar', compact('articulos'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $articulo = null;
        $categorias = categorias::all();

        return view('articulos.create', compact('articulo', 'categorias'));
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
        $campos = [
            'Nombre' => 'required|string|max:100',
            'cant' => 'required|string|max:100',
            'Precio' => 'required|string|max:100',
            'categoria_id' => 'required',
            'foto' => 'required|max:10000|mimes:jpeg,png,jpg',
        ];
        $Mensaje = ["required" => ':attribute es requerido'];
        $this->validate($request, $campos, $Mensaje);
        $datosArticulo = request()->except('_token');
        if ($request->hasFile('foto')) {
            $datosArticulo['foto'] = $request->file('foto')->store('uploads', 'public');
        }
        Articulos::insert($datosArticulo);
        return redirect('articulos')->with('Mensaje', 'Articulo agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function show(Articulos $articulos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $articulo = Articulos::findOrFail($id);
        $categorias = categorias::all();

        return view('articulos.edit', compact('articulo', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos = [
            'Nombre' => 'required|string|max:100',
            'cant' => 'required|string|max:100',
            'Precio' => 'required|string|max:100',
            'categoria_id' => 'required',
        ];
        if ($request->hasFile('foto')) {
            $campos += ['foto' => 'required|max:10000|mimes:jpeg,png,jpg'];
        }
        $Mensaje = ["required" => ':attribute es requerido'];
        $this->validate($request, $campos, $Mensaje);
        $datosArticulo = request()->except(['_token', '_method']);
        if ($request->hasFile('foto')) {
            $articulo = Articulos::findOrFail($id);
            //borrar fotografia
            //si existe en el disco lo va a eliminar para guardarlo nuevamente
            if (Storage::disk('public')->exists($articulo->foto)) {
                Storage::disk('public')->delete($articulo->foto);
            }

            $datosArticulo['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        Articulos::where('id', '=', $id)->update($datosArticulo);
        return redirect('articulos')->with('Mensaje', 'Articulo modificado con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $articulo = Articulos::findOrFail($id);
        //borrar fotografia
        //if( Storage::disk('public'.$articulo->foto)){
        //    Articulos::destroy($id);
        // }
        //si existe en el disco lo va a eliminar para guardarlo nuevamente
        if (Storage::disk('public')->exists($articulo->foto)) {
            Storage::disk('public')->delete($articulo->foto);
        }

        if ($articulo->delete()) {
            return redirect('articulos')->with('Mensaje', 'Articulo eliminado ');
        }

    }
}
