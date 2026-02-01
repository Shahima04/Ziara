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

    public function showOrders()
    {
        $this->page = 'orders';
    }

    public function showDashboard()
    {
        $this->page = 'dashboard';
    }
    
    //returns the blade view for this component
    public function render()
    {
        return view('livewire.admin-dashboard');
    }
}