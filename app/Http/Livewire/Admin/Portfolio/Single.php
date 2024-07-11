<?php

namespace App\Http\Livewire\Admin\Portfolio;

use App\Models\portfolio;
use Livewire\Component;

class Single extends Component
{

    public $portfolio;

    public function mount(Portfolio $Portfolio){
        $this->portfolio = $Portfolio;
    }

    public function delete()
    {
        $this->portfolio->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Portfolio') ]) ]);
        $this->emit('portfolioDeleted');
    }

    public function render()
    {
        return view('livewire.admin.portfolio.single')
            ->layout('admin::layouts.app');
    }
}
