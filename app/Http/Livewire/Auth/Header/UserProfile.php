<?php

namespace App\Http\Livewire\Auth\Header;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class UserProfile extends Component
{
    public $showActions = false;

    public function toggleShowActions() {
        $this->showActions = !$this->showActions;
    }

    public function render(): View
    {
        return view('livewire.auth.header.user-profile');
    }
}
