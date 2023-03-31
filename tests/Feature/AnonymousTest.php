<?php

it('returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

it('api alpahbet soup', function (string $char, string $expected) {
    $response = $this->getJson(route('alphabet', ['q' => $char]));

    $response
        ->assertStatus(200)
        ->assertJson(['alphabet' => $expected]);
})->with('alphabetsoupdataset');
