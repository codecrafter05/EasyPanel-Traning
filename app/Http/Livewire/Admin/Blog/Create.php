<?php

namespace App\Http\Livewire\Admin\Blog;

use App\Models\blog;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $title;
    public $creator;
    public $like;
    public $comment;
    public $subtitle;
    public $image;
    
    protected $rules = [
        'title' => 'required',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Blog') ])]);
        
        if($this->getPropertyValue('image') and is_object($this->image)) {
            $this->image = $this->getPropertyValue('image')->store('uploads/blog');
        }

        Blog::create([
            'title' => $this->title,
            'creator' => $this->creator,
            'like' => $this->like,
            'comment' => $this->comment,
            'subtitle' => $this->subtitle,
            'image' => $this->image,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.blog.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Blog') ])]);
    }
}
