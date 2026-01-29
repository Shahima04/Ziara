<?php

namespace App\Livewire;

use Livewire\Component;

class AdminDashboard extends Component
{
    public $page = 'dashboard';

    public function showProducts()
    {
        $this->page = 'products';
    }

    public function showDashboard()
    {
        $this->page = 'dashboard';
    }
    
    public function render()
    {
        return view('livewire.admin-dashboard');
    }
}