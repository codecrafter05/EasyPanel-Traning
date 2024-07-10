<?php

namespace App\Http\Livewire\Admin\About;

use App\Models\about;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $about;

    public $text1;
    public $title;
    public $subtitle;
    public $file_path;
    
    protected $rules = [
        'title' => 'required',        
    ];

    public function mount(About $About){
        $this->about = $About;
        $this->text1 = $this->about->text1;
        $this->title = $this->about->title;
        $this->subtitle = $this->about->subtitle;
        $this->file_path = $this->about->file_path;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('About') ]) ]);
        
        if($this->getPropertyValue('file_path') and is_object($this->file_path)) {
            $this->file_path = $this->getPropertyValue('file_path')->store('uploads/about');
        }

        $this->about->update([
            'text1' => $this->text1,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'file_path' => $this->file_path,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.about.update', [
            'about' => $this->about
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('About') ])]);
    }
}
