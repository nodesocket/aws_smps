<?php declare(strict_types=1);
    require __DIR__ . '/AWS_SMPS.php';

    try {
        $profile = getenv('AWS_PROFILE') ?: '';

        # Demo using PHP 8.0 named arguments. Order does not matter
        $smps = new AWS_SMPS(profile: $profile, region: 'us-east-2');

        $smps->put(AWS_SMPS::STRING, 'foo-string', 'bar', 'test string parameter');
        $smps->put(AWS_SMPS::STRING_LIST, 'foo-string-list', 'a,b,c,d', 'test string list parameter');
        $smps->put(AWS_SMPS::SECURE_STRING, 'foo-secure-string', 'secret', 'test secure string parameter');
        $smps->put(AWS_SMPS::SECURE_STRING, '/p/foo-secure-string', 'secret', 'test path secure string parameter');

        $parameters = $smps->get([
            'foo-string',
            'foo-string-list',
            'foo-secure-string',
            '/p/foo-secure-string'
        ]);

        $pathParameter = $smps->getPath('/p');

        $listAllParameters = $smps->list();

        $smps->delete([
            'foo-string',
            'foo-string-list',
            'foo-secure-string',
            '/p/foo-secure-string'
        ]);
    } catch(Exception $ex) {
        echo "error: " . $ex->getMessage();
    }
