<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Customer;
use Auth;
class Customers extends Component
{
    public $customers=[];
    public $search='';

    /*
    public function mount(){
        $this->customers=Customer::all();
    }*/

    public function render()
    {
        if(! $this->search){
            $this->customer=Customer::all();
        }else{
            $this->customers=Customer::where('name','like','%',$this->search.'%')->get();
        }
        return view('livewire.customers');
    }

    public function deletecustomer(Customer $customer){
        $customer->delete();

        session()->flash('success', 'Customer Deleted Successfully');
        return $this->redirect('/customers',navigate:true);
    }
}
