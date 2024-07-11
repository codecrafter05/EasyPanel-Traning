<?php

namespace App\Http\Livewire\Admin\Blog;

use App\Models\blog;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $blog;

    public $title;
    public $creator;
    public $like;
    public $comment;
    public $subtitle;
    public $image;
    
    protected $rules = [
        'title' => 'required',        
    ];

    public function mount(Blog $Blog){
        $this->blog = $Blog;
        $this->title = $this->blog->title;
        $this->creator = $this->blog->creator;
        $this->like = $this->blog->like;
        $this->comment = $this->blog->comment;
        $this->subtitle = $this->blog->subtitle;
        $this->image = $this->blog->image;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Blog') ]) ]);
        
        if($this->getPropertyValue('image') and is_object($this->image)) {
            $this->image = $this->getPropertyValue('image')->store('uploads/blog');
        }

        $this->blog->update([
            'title' => $this->title,
            'creator' => $this->creator,
            'like' => $this->like,
            'comment' => $this->comment,
            'subtitle' => $this->subtitle,
            'image' => $this->image,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.blog.update', [
            'blog' => $this->blog
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Blog') ])]);
    }
}
