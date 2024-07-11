<?php

namespace App\Http\Livewire\Admin\Service;

use App\Models\service;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $service;

    public $title;
    public $subtitle;
    public $icon;
    
    protected $rules = [
        'title' => 'required',        
    ];

    public function mount(Service $Service){
        $this->service = $Service;
        $this->title = $this->service->title;
        $this->subtitle = $this->service->subtitle;
        $this->icon = $this->service->icon;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Service') ]) ]);
        
        if($this->getPropertyValue('icon') and is_object($this->icon)) {
            $this->icon = $this->getPropertyValue('icon')->store('uploads/service');
        }

        $this->service->update([
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'icon' => $this->icon,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.service.update', [
            'service' => $this->service
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Service') ])]);
    }
}
