<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Blog;
use Illuminate\Http\Request;
use App\Member;
class Home extends Component
{
    public $email;
    public function render()
    {
        $data = Blog::orderBy('created_at', 'desc')
            ->with('user:id,name')
            ->with('kategori:id,nama')
            ->limit(4)
            ->get();

        return view('livewire.home', [
            'data' => $data
        ]);
    }

    public function saveMember(Request $request)
    {
        $validatedData = $this->validate([
            'email' => 'required|email|unique:members',
        ]);

        Member::create($validatedData);
        $this->email = '';
        return redirect()->back()->with('success', 'Anda berhasil menjadi member !');
    }

}
