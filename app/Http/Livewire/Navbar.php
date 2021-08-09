<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Category;

class Navbar extends Component
{
    public function render()
    {
        $data = Category::select('id', 'nama')->get();

        return view('livewire.navbar', ['data' => $data]);
    }
}
