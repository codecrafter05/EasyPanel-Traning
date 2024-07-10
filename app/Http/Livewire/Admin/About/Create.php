<?php

namespace App\Http\Livewire\Admin\About;

use App\Models\about;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $text1;
    public $title;
    public $subtitle;
    public $file_path;
    
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

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('About') ])]);
        
        if($this->getPropertyValue('file_path') and is_object($this->file_path)) {
            $this->file_path = $this->getPropertyValue('file_path')->store('uploads/about');
        }

        About::create([
            'text1' => $this->text1,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'file_path' => $this->file_path,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.about.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('About') ])]);
    }
}
