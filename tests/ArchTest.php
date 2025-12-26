<?php

it('can test', function () {
    expect(true)->toBeTrue();
});

it('will not use debugging functions')
    ->expect(['dd', 'dump', 'ray'])
    ->not->toBeUsed();
