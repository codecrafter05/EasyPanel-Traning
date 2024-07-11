<?php

namespace App\Http\Livewire\Admin\Testmonial;

use App\Models\testmonial;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $testmonial;

    public $name;
    public $comment;
    public $image;
    
    protected $rules = [
        'name' => 'required',        
    ];

    public function mount(Testmonial $Testmonial){
        $this->testmonial = $Testmonial;
        $this->name = $this->testmonial->name;
        $this->comment = $this->testmonial->comment;
        $this->image = $this->testmonial->image;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Testmonial') ]) ]);
        
        if($this->getPropertyValue('image') and is_object($this->image)) {
            $this->image = $this->getPropertyValue('image')->store('uploads/testmonial');
        }

        $this->testmonial->update([
            'name' => $this->name,
            'comment' => $this->comment,
            'image' => $this->image,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.testmonial.update', [
            'testmonial' => $this->testmonial
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Testmonial') ])]);
    }
}
