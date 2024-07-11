<?php

namespace App\Http\Livewire\Admin\Service;

use App\Models\service;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $title;
    public $subtitle;
    public $icon;
    
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

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Service') ])]);
        
        if($this->getPropertyValue('icon') and is_object($this->icon)) {
            $this->icon = $this->getPropertyValue('icon')->store('uploads/service');
        }

        Service::create([
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'icon' => $this->icon,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.service.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Service') ])]);
    }
}
