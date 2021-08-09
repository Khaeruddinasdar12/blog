<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Blog;
use Livewire\WithPagination;

class BlogIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        $data = Blog::with('kategori:id,nama')
        ->with('user:id,name')
        ->orderBy('created_at', 'desc')
        ->paginate(8);
        
        $terbaru = Blog::select('id', 'judul', 'slug', 'user_id', 'category_id')
            ->with('user:id,name')
            ->with('kategori:id,nama')
            ->orderBy('created_at', 'desc')
            ->limit(3)->get();

        return view('livewire.blog-index', [
            'data' => $data,
            'terbaru' => $terbaru
        ]);
    }
}
