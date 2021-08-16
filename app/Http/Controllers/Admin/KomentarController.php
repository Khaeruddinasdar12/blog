<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Komentar;
class KomentarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Komentar::with('blog:id,judul')
            ->orderBy('created_at', 'desc')
            ->paginate(12);
        return view('admin.komentar.index', ['data' => $data]);
    }
}
