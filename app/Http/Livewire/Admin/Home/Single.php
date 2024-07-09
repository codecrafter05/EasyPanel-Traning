<?php

namespace App\Http\Livewire\Admin\Home;

use App\Models\home;
use Livewire\Component;

class Single extends Component
{

    public $home;

    public function mount(Home $Home){
        $this->home = $Home;
    }

    public function delete()
    {
        $this->home->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Home') ]) ]);
        $this->emit('homeDeleted');
    }

    public function render()
    {
        return view('livewire.admin.home.single')
            ->layout('admin::layouts.app');
    }
}
