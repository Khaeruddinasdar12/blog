<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class BlogCategory extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $category;

    public function mount($category)
    {
        $this->category = $category; 
    }

    public function render()
    {
        $id_kategori = \App\Category::where('nama', $this->category)->first();
        if($id_kategori == null) {
            abort(404);
        }
        
        $data = \App\Blog::where('category_id', $id_kategori->id)
            ->with('kategori:id,nama')
            ->with('user:id,name')
            ->orderBy('created_at', 'desc')
            ->paginate(8);

        $terbaru = \App\Blog::select('id', 'judul', 'slug', 'user_id', 'category_id')
            ->with('user:id,name')
            ->with('kategori:id,nama')
            ->orderBy('created_at', 'desc')
            ->limit(3)->get();

        return view('livewire.blog-category', [
            'data' => $data,
            'terbaru' => $terbaru,
            'kategori' => $this->category
        ]);
    }
}
