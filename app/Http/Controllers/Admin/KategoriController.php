<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Category;
use App\Blog;
class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.manage-kategori.index');
    }

    public function store(Request $request)
    {
        $validasi = $this->validate($request, [
            'nama'     => 'required|string',
        ]);

        $data = new Category;

        $data->nama = $request->nama;
        $data->save();

        return $arrayName = array(
            'status' => 'success',
            'pesan' => 'Berhasil Menambah Kategori.'
        );
    }

    public function update(Request $request)
    {
        $validasi = $this->validate($request, [
            'nama'     => 'required|string'
        ]);

        $data = Category::findOrFail($request->hidden_id);
        $data->nama     = $request->nama;
        $data->save();

        return $arrayName = array(
            'status' => 'success',
            'pesan' => 'Berhasil Mengubah Kategori.'
        );
    }

    public function delete(Request $request, $id) //delete kategori
    {
        $cek = Blog::where('category_id', $id)->count();
        if($cek > 0) {
            return $arrayName = array(
                'status' => 'error',
                'pesan' => 'Kategori ini memiliki artikel atau blog'
            );
        }

        $data = Category::find($id);
        if($data == '') {
            return $arrayName = array(
                'status' => 'error',
                'pesan' => 'Data kategori blog tidak ditemukan'
            );
        }
        $data->delete();

        return $arrayName = array(
            'status' => 'success',
            'pesan' => 'Berhasil Menghapus Kategori Blog.',
            'table' => 'kategori'
        );
    }

    public function tableKategori() // api table kategori untuk datatable
    {
        $data = Category::select('id', 'nama')->get();

        return Datatables::of($data)
        ->addColumn('action', function ($data) {
            return "
            <a href='' class='btn btn-success btn-xs'
            data-toggle='modal' 
            data-target='#modal-edit-kategori'
            title='edit kategori'
            data-id='".$data->id."'
            data-nama='".$data->nama."'
            >
            <i class='fa fa-edit'></i>
            </a>

            <button class='btn btn-danger btn-xs'
            title='Hapus Blog' 
            href='manage-kategori/".$data->id."'
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
