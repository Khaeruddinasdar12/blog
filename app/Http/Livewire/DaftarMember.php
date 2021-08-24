<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Member;
use Illuminate\Http\Request;

class DaftarMember extends Component
{
    public $email;
    public function render()
    {
        return view('livewire.daftar-member');
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
