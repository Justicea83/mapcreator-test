<?php

namespace App\Http\Livewire\Auth\Header;

use Livewire\Component;

class UserProfileMobile extends Component
{
    public $showActions = false;

    public function toggleShowActions() {
        $this->showActions = !$this->showActions;
    }

    public function render()
    {
        return view('livewire.auth.header.user-profile-mobile');
    }
}
