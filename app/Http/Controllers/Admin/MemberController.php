<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Member;
class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Member::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.member.index', ['data' => $data]);
    }
}
