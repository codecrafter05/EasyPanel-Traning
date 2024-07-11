<?php

namespace App\Http\Livewire\Admin\Testmonial;

use App\Models\testmonial;
use Livewire\Component;

class Single extends Component
{

    public $testmonial;

    public function mount(Testmonial $Testmonial){
        $this->testmonial = $Testmonial;
    }

    public function delete()
    {
        $this->testmonial->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Testmonial') ]) ]);
        $this->emit('testmonialDeleted');
    }

    public function render()
    {
        return view('livewire.admin.testmonial.single')
            ->layout('admin::layouts.app');
    }
}
