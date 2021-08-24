<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pesan;
class PesanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Pesan::orderBy('created_at', 'desc')->paginate(12);
        return view('admin.kontak.index', ['data' => $data]);
    }
}
