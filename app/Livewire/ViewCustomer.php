<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Customer;

class ViewCustomer extends Component
{
    public $customers = [];
    public $search = '';

    public function mount()
    {
        $this->loadCustomers();
    }

    /*public function loadCustomers()
    {
        $this->customers = Customer::all();
    }*/

    public function loadCustomers() 
    { $this->customers = Customer::query() ->where('name', 'like', '%' . $this->search . '%') 
        ->orWhere('email', 'like', '%' . $this->search . '%') 
        ->orWhere('phone', 'like', '%' . $this->search . '%') 
        ->get();
    }

    protected $listeners = ['customerUpdated' => 'loadCustomers', 'searchUpdated' => 'loadCustomers']; public function updatedSearch() 
    { 
        $this->emit('searchUpdated'); 
    }

    public function render()
    {
        return view('livewire.view-customer', ['customers' => $this->customers]);
    }
}
