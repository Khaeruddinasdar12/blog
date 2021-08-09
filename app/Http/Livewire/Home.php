<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Blog;

class Home extends Component
{
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

}
