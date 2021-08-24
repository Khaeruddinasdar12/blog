<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Pesan;
use Illuminate\Http\Request;
use App\Member;

class Contact extends Component
{
    public $judul;
    public $email;
    public $nama;
    public $pesan;

    public function render()
    {
        return view('livewire.contact');
    }

    public function savePesan(Request $request)
    {
        $validatedData = $this->validate([
            'email' => 'required|email',
            'nama' => 'required|string',
            'judul' => 'required|string',
            'pesan' => 'required|string',
        ]);

        $data = new Pesan;
        $data->nama = $this->nama;
        $data->email = $this->email;
        $data->judul = $this->judul;
        $data->pesan = $this->pesan;
        $data->save();

        $cekEmail = Member::where('email', $this->email)->count();
        if($cekEmail == 0) {
            $saveMember = new Member;
            $saveMember->email = $this->email;
            $saveMember->save();
        }

        $this->nama = '';
        $this->judul = '';
        $this->email = '';
        $this->pesan = '';
        return redirect()->back()->with('success', 'Berhasil mengirim pesan !');
    }
}
