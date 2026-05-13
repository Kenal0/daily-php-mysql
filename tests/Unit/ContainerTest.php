<?php

use Core\Validator;

test('it can resolve something out of the container', function () {
        $validator = new Validator();

    $result = $validator->email('fdjskfkdjsm');

        expect((bool)($result))->toBeTrue();
});
