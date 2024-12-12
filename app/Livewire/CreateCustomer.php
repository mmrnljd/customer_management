<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class CreateCustomer extends Component
{
    public $name = '';
    public $email = '';
    public $phone = '';

    protected $rules = [
        'name' => 'required|max:255',
        'email' => 'required|email|unique:customers|max:255',
        'phone' => 'required|unique:customers|max:255',
    ];

    public function save()
    {
        $validated = $this->validate();

        Customer::create($validated);
        //$this->reset();

        session()->flash('success', 'Customer Created Successfully');
        $this->emit('customerUpdated');
                return $this->redirect('/customers', navigate: true);
    }

    public function render()
    {
        return view('livewire.create-customer');
    }
}
