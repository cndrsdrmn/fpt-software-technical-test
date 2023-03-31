<?php

namespace App\Http\Requests;

use App\Models\Customer;

class StoreCustomerRequest extends CustomerFormRequest
{
    /**
     * Create a new customer.
     */
    public function createCustomer(): Customer
    {
        return Customer::create($this->safe()->all());
    }
}
