<?php

namespace App\Livewire;

use App\Models\Tag;
use Livewire\Component;

class TagsDropdown extends Component
{
    public $tags = [];

    public function render()
    {
        $this->tags = Tag::pluck('name')->toArray();

        return view('livewire.tags-dropdown');
    }
}