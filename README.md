# AWS systems manager parameter store PHP class

See [index.php]() for full examples.

## API

#### constructor($region = null, $profile = null)

#### put($type, $name, $value, $description = null, Array $tags = [])

#### get(Array $parameters, $with_decryption = true)

#### get_path($path, $recursive = true, $with_decryption = true)

#### list(Array $filters = [])

#### delete(Array $parameters)

## Class constants

Use the following constants when calling `put` as the function argument `$type`.

```
AWS_SMPS::STRING
```

```
AWS_SMPS::STRINGLIST
```

```
AWS_SMPS::SECURESTRING
```

```
AWS_SMPS::SECURESTRING
```
