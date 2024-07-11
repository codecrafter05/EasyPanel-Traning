<?php

namespace App\Http\Livewire\Admin\Portfolio;

use App\Models\portfolio;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $title;
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

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Portfolio') ])]);
        
        if($this->getPropertyValue('image') and is_object($this->image)) {
            $this->image = $this->getPropertyValue('image')->store('uploads/portfolio');
        }

        Portfolio::create([
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'image' => $this->image,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.portfolio.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Portfolio') ])]);
    }
}
