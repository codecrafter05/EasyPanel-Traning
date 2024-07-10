<?php

namespace App\Http\Livewire\Admin\About;

use App\Models\about;
use Livewire\Component;

class Single extends Component
{

    public $about;

    public function mount(About $About){
        $this->about = $About;
    }

    public function delete()
    {
        $this->about->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('About') ]) ]);
        $this->emit('aboutDeleted');
    }

    public function render()
    {
        return view('livewire.admin.about.single')
            ->layout('admin::layouts.app');
    }
}
