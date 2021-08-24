<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Blog;
use App\Komentar;
use Illuminate\Http\Request;
use App\Member;

class BlogDetail extends Component
{
    public $slug;
    public $email;
    public $nama;
    public $komentar;

    public function mount($slug)
    {
        $this->slug = $slug; 
    }

    public function render()
    {
        $data = Blog::with('kategori:id,nama')->where('slug', $this->slug)->first();
        if($data == '') {
            abort(404);
        }
        // dd($data); 
        return view('livewire.blog-detail', ['data' => $data]);
    }

    public function saveKomentar(Request $request, $id)
    {
        $validatedData = $this->validate([
            'email' => 'required|email',
            'nama' => 'required|string',
            'komentar' => 'required|string',
        ]);

        $data = new Komentar;
        $data->nama = $this->nama;
        $data->email = $this->email;
        $data->komentar = $this->komentar;
        $data->blog_id = $id;
        $data->save();

        $cekEmail = Member::where('email', $this->email)->count();
        if($cekEmail == 0) {
            $saveMember = new Member;
            $saveMember->email = $this->email;
            $saveMember->save();
        }

        $this->nama = '';
        $this->email = '';
        $this->komentar = '';
        return redirect()->back()->with('success', 'Berhasil mengirim komentar !');
    }
}
