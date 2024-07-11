<?php

namespace App\Http\Livewire\Admin\Portfolio;

use App\Models\portfolio;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $portfolio;

    public $title;
    public $subtitle;
    public $image;
    
    protected $rules = [
        'title' => 'required',        
    ];

    public function mount(Portfolio $Portfolio){
        $this->portfolio = $Portfolio;
        $this->title = $this->portfolio->title;
        $this->subtitle = $this->portfolio->subtitle;
        $this->image = $this->portfolio->image;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Portfolio') ]) ]);
        
        if($this->getPropertyValue('image') and is_object($this->image)) {
            $this->image = $this->getPropertyValue('image')->store('uploads/portfolio');
        }

        $this->portfolio->update([
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'image' => $this->image,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.portfolio.update', [
            'portfolio' => $this->portfolio
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Portfolio') ])]);
    }
}
