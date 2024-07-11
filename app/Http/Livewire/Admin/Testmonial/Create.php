<?php

namespace App\Http\Livewire\Admin\Testmonial;

use App\Models\testmonial;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $comment;
    public $image;
    
    protected $rules = [
        'name' => 'required',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Testmonial') ])]);
        
        if($this->getPropertyValue('image') and is_object($this->image)) {
            $this->image = $this->getPropertyValue('image')->store('uploads/testmonial');
        }

        Testmonial::create([
            'name' => $this->name,
            'comment' => $this->comment,
            'image' => $this->image,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.testmonial.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Testmonial') ])]);
    }
}
