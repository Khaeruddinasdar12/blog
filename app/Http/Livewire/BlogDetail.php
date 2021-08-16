<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Blog;

class BlogDetail extends Component
{
    public $slug;

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
}
