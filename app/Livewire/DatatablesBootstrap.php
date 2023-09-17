<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Cache;

class DatatablesBootstrap extends Component
{
    use WithPagination;

    public $page;

    public function mount()
    {
        $this->page = request()->page ?? 1; // Atur halaman awal atau ambil halaman dari URL
    }

    public function updatingPage($page)
    {
        $this->page = $page;
        session(['current_page' => $page]); // Simpan halaman saat ini ke session
    }

    public function render()
    {
        $page = session('current_page', 1); // Ambil halaman dari session atau aturan

        $posts = Cache::remember('posts_' . $page, now()->addMinutes(10), function () use ($page) {
            return Post::with(['User', 'Category'])
            ->select(['posts.id', 'posts.title', 'posts.category_id', 'posts.user_id', 'posts.image'])
            ->latest()
            ->paginate(10);
        });

        return view('livewire.datatables-bootstrap', compact('posts'));
    }
}
