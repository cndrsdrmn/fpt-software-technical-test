<?php

use App\Models\Customer;

dataset('customer', function () {
    return [
        'customer' => fn () => Customer::factory()->create(),
    ];
});

dataset('customers', function () {
    return [
        'customers' => fn () => Customer::factory()->count(20)->create(),
    ];
});

dataset('customerdataset', function () {
    return [
        'payload' => fn () => Customer::factory()->make()->toArray(),
    ];
});
