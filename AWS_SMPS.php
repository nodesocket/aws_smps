<?php
    require __DIR__ . '/vendor/autoload.php';

    use Aws\Ssm\SsmClient;

    class AWS_SMPS {
        const VERSION = '1.0.0';

        const STRING = 'String';
        const STRINGLIST = 'StringList';
        const SECURESTRING = 'SecureString';

        public function __construct($region = null, $profile = null) {
            $this->client = new SsmClient([
                'version' => 'latest',
                'region' => $region,
                'profile' => $profile
            ]);
        }

        public function put($type, $name, $value, $description = null, Array $tags = []) {
            return $this->client->putParameter([
                'Overwrite' => true,
                'Type' => $type,
                'Name' => $name,
                'Value' => $value,
                'Description' => $description,
                'Tags' => $tags
            ]);
        }

        public function get(Array $parameters, $with_decryption = true) {
            return $this->client->getParameters([
                'Names' => $parameters,
                'WithDecryption' => $with_decryption
            ]);
        }

        public function get_path($path, $recursive = true, $with_decryption = true) {
            return $this->client->getParametersByPath([
                'Path' => $path,
                'Recursive' => $recursive,
                'WithDecryption' => $with_decryption
            ]);
        }

        public function list(Array $filters = []) {
            return $this->client->describeParameters([
                'Filters' => $filters
            ]);
        }

        public function delete(Array $parameters) {
            return $this->client->deleteParameters([
                'Names' => $parameters
            ]);
        }
    }
