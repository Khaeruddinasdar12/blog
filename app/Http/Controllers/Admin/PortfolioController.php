<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Portfolio;
use Auth;
use DataTables;

class PortfolioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.manage-portfolio.index');
    }

    public function create() //halaman create portfolio
    {
        return view('admin.manage-portfolio.create');
    }

    public function store(Request $request)
    {
        $validasi = $this->validate($request, [
            'judul'     => 'required|string|max:200',
            'isi'       => 'required|string',
            'gambar'    => 'image|mimes:jpeg,png,jpg|max:3072',
        ]);

        $data = new Portfolio;

        $data->judul     = $request->judul;
        $data->isi       = $request->isi;
        $data->slug     = Str::slug($request->judul, '-'); 

        $gambar = $request->file('gambar');
        if ($gambar) {
            $gambar_path = $gambar->store('gambar', 'public');
            $data->gambar = $gambar_path;
        }

        $data->user_id = Auth::user()->id;
        $data->save();

        return redirect()->back()->with('success', $data->id);
    }

    public function edit($id) //halaman edit portfolio
    {
        $data = Portfolio::findOrFail($id);

        return view('admin.manage-portfolio.edit', [
            'data'  => $data
        ]);
    } 

    public function update(Request $request, $id)
    {
        $validasi = $this->validate($request, [
            'judul'     => 'required|string|max:200',
            'isi'       => 'required|string',
            'gambar'    => 'image|mimes:jpeg,png,jpg|max:3072',
        ]);

        $data = Portfolio::findOrFail($id);

        $data->judul     = $request->judul;
        $data->isi       = $request->isi;
        $data->slug     = Str::slug($request->judul, '-');

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

    public function tablePortfolio() // api table portfolio untuk datatable
    {
        $data = Portfolio::orderBy('created_at', 'desc')
            ->get();

        return Datatables::of($data)
        ->addColumn('action', function ($data) {
            return "
            <a href='manage-portfolio/show/".$data->id."' class='btn btn-info btn-xs' 
            title='detail berita'
            >
            <i class='fa fa-eye'></i>
            </a>

            <a href='manage-portfolio/edit/".$data->id."' class='btn btn-success btn-xs'>
            <i class='fa fa-edit'></i>
            </a>

            <button class='btn btn-danger btn-xs'
            title='Hapus Blog' 
            href='manage-portfolio/".$data->id."'
            onclick='hapus_data()'
            id='del_id'
            >
            <i class='fa fa-trash'></i>
            </button>";
        })
        ->editColumn('gambar', function ($data) {
            return "<img src='../storage/".$data->gambar."' height='72px' weight='72px'>";
        })
        ->rawColumns(['gambar', 'action'])
        ->addIndexColumn() 
        ->make(true);
    }
}
