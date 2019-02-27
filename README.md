# AWS systems manager parameter store PHP class

See [index.php](https://github.com/nodesocket/aws_smps/blob/master/index.php) for full examples.

## API

```
constructor($region = null, $profile = null)
```

```
put($type, $name, $value, $description = null, array $tags = [])
```

```
get(array $parameters, bool $with_decryption = true)
```

```
get_path($path, bool $recursive = true, bool $with_decryption = true)
```

```
list(array $filters = [])
```

```
delete(array $parameters)
```

## Class constants

Use the following constants when calling `put()` as the function argument `$type`.

```
AWS_SMPS::STRING
```

```
AWS_SMPS::STRINGLIST
```

```
AWS_SMPS::SECURESTRING
```

Get the version of `AWS_SMPS`.

```
AWS_SMPS::VERSION
```
