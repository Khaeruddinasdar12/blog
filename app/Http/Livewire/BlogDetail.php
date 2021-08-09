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
        $data = Blog::where('slug', $this->slug)->first();
        // dd($data); 
        return view('livewire.blog-detail', ['data' => $data]);
    }
}
