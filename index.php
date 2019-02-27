<?php
    require __DIR__ . '/AWS_SMPS.php';

    try {
        $smps = new AWS_SMPS('aws-region', 'aws-profile');

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

        $path_parameter = $smps->get_path('/p');

        $list_all_parameters = $smps->list();

        $smps->delete([
            'foo-string',
            'foo-string-list',
            'foo-secure-string',
            '/p/foo-secure-string'
        ]);
    } catch(Exception $ex) {
        echo "Oops! An error occurred. " . $ex->getMessage();
    }
