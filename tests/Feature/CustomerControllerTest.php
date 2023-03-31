<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

$customerStructure = [
    'customer' => [
        'cust_id',
        'cust_name',
        'cust_address',
    ],
];

it('get resources of customers', function ($_) {
    $sturcture = [
        'data' => [
            '*' => [
                'cust_id',
                'cust_name',
                'cust_address',
            ],
        ],
        'links' => [
            '*' => [
                'url',
                'label',
                'active',
            ],
        ],
        'current_page',
        'from',
        'last_page',
        'path',
        'per_page',
        'to',
        'total',
    ];

    $response = $this->getJson(route('customers.index'));
    $response->assertOk();
    $response->assertJsonStructure($sturcture);
})->with('customers');

it('get a record of customer', function ($customer) use ($customerStructure) {
    $reponse = $this->getJson(route('customers.show', $customer));
    $reponse->assertOk();
    $reponse->assertJsonStructure($customerStructure);
})->with('customer');

it('create a record of customer', function ($parameters) use ($customerStructure) {
    $response = $this->postJson(route('customers.store'), $parameters);
    $response->assertCreated();
    $response->assertJsonStructure($customerStructure);
})->with('customerdataset');

it('update a record of customer', function ($customer, $parameters) use ($customerStructure) {
    $customer = call_user_func($customer);
    $parameters = call_user_func($parameters);
    $response = $this->putJson(route('customers.update', $customer), $parameters);
    $response->assertOk();
    $response->assertJsonStructure($customerStructure);
})->with('customer')->with('customerdataset');

it('delete a record of customer', function ($customer) {
    $response = $this->deleteJson(route('customers.destroy', $customer));
    $response->assertOk();
    $response->assertJsonStructure(['message']);
})->with('customer');
