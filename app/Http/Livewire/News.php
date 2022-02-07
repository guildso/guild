<?php

namespace App\Http\Livewire;

use Livewire\Component;

class News extends Component
{
    public $news;
    public $company;

    public function mount(){
        $company = \App\Models\Company::first();
        $this->news = $company->news;
    }

    public function saveNews(){
        $company = \App\Models\Company::first();

        $company->news = $this->news;
        $company->save();

        $this->dispatchBrowserEvent('notification', ['type' => 'success', 'message' => 'Successfully updated your company news!']);
    }

    public function render()
    {
        return view('livewire.news');
    }
}
