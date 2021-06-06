<?php declare(strict_types=1);
    require __DIR__ . '/vendor/autoload.php';

    use Aws\Ssm\SsmClient;

    class AWS_SMPS {
        public const VERSION = '2.0.2';

        public const STRING = 'String';
        public const STRING_LIST = 'StringList';
        public const SECURE_STRING = 'SecureString';

        public function __construct(string $region = null, string $profile = null, string $version = 'latest') {
            $this->client = new SsmClient([
                'version' => $version,
                'region' => $region,
                'profile' => $profile
            ]);
        }

        public function put(string $type, string $name, mixed $value, string $description = null, array $tags = []) {
            return $this->client->putParameter([
                'Overwrite' => true,
                'Type' => $type,
                'Name' => $name,
                'Value' => $value,
                'Description' => $description,
                'Tags' => $tags
            ]);
        }

        public function get(array $parameters, bool $withDecryption = true) {
            return $this->client->getParameters([
                'Names' => $parameters,
                'WithDecryption' => $withDecryption
            ]);
        }

        public function getPath(string $path, bool $recursive = true, bool $withDecryption = true) {
            return $this->client->getParametersByPath([
                'Path' => $path,
                'Recursive' => $recursive,
                'WithDecryption' => $withDecryption
            ]);
        }

        public function list(array $filters = []) {
            return $this->client->describeParameters([
                'Filters' => $filters
            ]);
        }

        public function delete(array $parameters) {
            return $this->client->deleteParameters([
                'Names' => $parameters
            ]);
        }
    }
