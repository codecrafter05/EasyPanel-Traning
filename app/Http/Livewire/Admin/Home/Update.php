<?php

namespace App\Http\Livewire\Admin\Home;

use App\Models\home;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $home;

    public $title;
    public $subtitle;
    public $file_path;
    
    protected $rules = [
        'title' => 'required',        
    ];

    public function mount(Home $Home){
        $this->home = $Home;
        $this->title = $this->home->title;
        $this->subtitle = $this->home->subtitle;
        $this->file_path = $this->home->file_path;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Home') ]) ]);
        
        if($this->getPropertyValue('file_path') and is_object($this->file_path)) {
            $this->file_path = $this->getPropertyValue('file_path')->store('uploads/home');
        }

        $this->home->update([
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'file_path' => $this->file_path,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.home.update', [
            'home' => $this->home
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Home') ])]);
    }
}
