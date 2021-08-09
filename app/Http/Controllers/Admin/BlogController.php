<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Category;
use App\Blog;
use Auth;
use DataTables;
class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.manage-blog.index');
    }

    public function create() //halaman create blog
    {
        $data = Category::select('id', 'nama')->get();
        return view('admin.manage-blog.create', ['ktg' => $data]);
    }

    public function store(Request $request)
    {
        $validasi = $this->validate($request, [
            'judul'     => 'required|string|max:200',
            'isi'       => 'required|string',
            'gambar'    => 'image|mimes:jpeg,png,jpg|max:3072',
            'kategori'  => 'required|numeric'
        ]);

        $data = new Blog;

        $data->judul     = $request->judul;
        $data->isi       = $request->isi;
        $data->slug     = Str::slug($request->judul, '-'); 
        $data->category_id  = $request->kategori;

        $gambar = $request->file('gambar');
        if ($gambar) {
            $gambar_path = $gambar->store('gambar', 'public');
            $data->gambar = $gambar_path;
        }

        $data->user_id = Auth::user()->id;
        $data->save();

        return redirect()->back()->with('success', $data->id);
    }

    public function edit($id) //halaman edit blog
    {
        $ktg = Category::select('id', 'nama')->get();
        $data = Blog::findOrFail($id);

        return view('admin.manage-blog.edit', [
            'data'  => $data,
            'ktg'   => $ktg
        ]);
    } 

    public function update(Request $request, $id)
    {
        $validasi = $this->validate($request, [
            'judul'     => 'required|string|max:200',
            'isi'       => 'required|string',
            'gambar'    => 'image|mimes:jpeg,png,jpg|max:3072',
            'kategori'  => 'required'
        ]);

        $data = Blog::findOrFail($id);

        $data->judul     = $request->judul;
        $data->isi       = $request->isi;
        $data->slug     = Str::slug($request->judul, '-'); 
        $data->category_id  = $request->kategori;

        $gambar = $request->file('gambar');
        if ($gambar) {
            if ($data->gambar && file_exists(storage_path('app/public/' . $data->gambar))) {
                \Storage::delete('public/' . $data->gambar);
            }
            $gambar_path = $gambar->store('gambar', 'public');
            $data->gambar = $gambar_path;
        }

        $data->user_id = Auth::user()->id;
        $data->save();

        return redirect()->back()->with('success', $data->id);
    }

    public function tableBlog() // api table blog untuk datatable
    {
        $data = Blog::with('kategori:id,nama')
            ->orderBy('created_at', 'desc')
            ->get();

        return Datatables::of($data)
        ->addColumn('action', function ($data) {
            return "
            <a href='manage-blog/show/".$data->id."' class='btn btn-info btn-xs' 
            title='detail berita'
            >
            <i class='fa fa-eye'></i>
            </a>

            <a href='manage-blog/edit/".$data->id."' class='btn btn-success btn-xs'>
            <i class='fa fa-edit'></i>
            </a>

            <button class='btn btn-danger btn-xs'
            title='Hapus Blog' 
            href='manage-blog/".$data->id."'
            onclick='hapus_data()'
            id='del_id'
            >
            <i class='fa fa-trash'></i>
            </button>";
        })
        ->addIndexColumn() 
        ->make(true);
    }

}
