<?php

namespace App\Http\Controllers;

use App\categorias;
use App\Post;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function personal()
    {
        $posts = Post ::select('id','nombre', 'foto')
            ->where('categoria_id', '=', 1)
            ->get();
        return view('posts.personal', compact('posts'));
    }
     
    public function index()
    {
        $datos['posts'] = Post::paginate(5);
        $categorias = categorias::all();
        $products = Product::all();
        return view('posts.index', $datos, compact('categorias' , 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = null;
        $categorias = categorias::all();
        $products = Product::all();

        return view('posts.create', compact('post', 'categorias' , 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos = [
            'nombre' => 'required|string|max:100',
            'product_id' => 'required',
            'descripcion' => 'required|string|max:100',
            'categoria_id' => 'required',
            'foto' => 'required|max:10000|mimes:jpeg,png,jpg',
        ];
        $Mensaje = ["required" => ':attribute es requerido'];
        $this->validate($request, $campos, $Mensaje);
        $datosArticulo = request()->except('_token');
        if ($request->hasFile('foto')) {
            $datosArticulo['foto'] = $request->file('foto')->store('uploads', 'public');
        }
        Post::insert($datosArticulo);
        return redirect('posts')->with('Mensaje', 'Articulo agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categorias = categorias::all();
        $products = Product::all();


        return view('posts.edit', compact('post', 'categorias' , 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'nombre' => 'required|string|max:100',
            'product_id' => 'required|string|max:100',
            'descripcion' => 'required|string|max:100',
            'categoria_id' => 'required',
        ];
        if ($request->hasFile('foto')) {
            $campos += ['foto' => 'required|max:10000|mimes:jpeg,png,jpg'];
        }
        $Mensaje = ["required" => ':attribute es requerido'];
        $this->validate($request, $campos, $Mensaje);
        $datosArticulo = request()->except(['_token', '_method']);
        if ($request->hasFile('foto')) {
            $post = Post::findOrFail($id);
            //borrar fotografia
            //si existe en el disco lo va a eliminar para guardarlo nuevamente
            if (Storage::disk('public')->exists($post->foto)) {
                Storage::disk('public')->delete($post->foto);
            }

            $datosArticulo['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        Post::where('id', '=', $id)->update($datosArticulo);
        return redirect('posts')->with('Mensaje', 'Articulo modificado con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        //borrar fotografia
        //if( Storage::disk('public'.$articulo->foto)){
        //    Articulos::destroy($id);
        // }
        //si existe en el disco lo va a eliminar para guardarlo nuevamente
        if (Storage::disk('public')->exists($post->foto)) {
            Storage::disk('public')->delete($post->foto);
        }

        if ($post->delete()) {
            return redirect('posts')->with('Mensaje', 'Articulo eliminado ');
        }
    }
}
