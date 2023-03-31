<?php

use App\Support\FptHelper;

it('alphabet soup', function (string $char, string $expected) {
    expect(FptHelper::alphabetSoup($char))->toBeString()->toBe($expected);
})->with('alphabetsoupdataset');
