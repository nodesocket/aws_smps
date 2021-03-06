# AWS Systems Manager Parameter Store _(AWS_SMPS)_ PHP class

Optimized for use with [PHP 8.0](https://www.php.net/releases/8.0/en.php).

 - [Named arguments](https://wiki.php.net/rfc/named_params)
 - [Type declaration for arguments, return values, class props](https://www.php.net/manual/en/language.types.declarations.php)
 - [Class props and method visability](https://www.php.net/manual/en/language.oop5.visibility.php)

See [example.php](https://github.com/nodesocket/aws_smps/blob/master/example.php) for a full example.

## API

```
constructor(string $region = null, string $profile = null, string $version = 'latest')
```

```
put(string $type, string $name, string $value, string $description = null, array $tags = [])
```

```
get(array $parameters, bool $with_decryption = true)
```

```
get_path(string $path, bool $recursive = true, bool $with_decryption = true)
```

```
list(array $filters = [])
```

```
delete(array $parameters)
```

## Class constants

Use the following class constants when calling `put()` as the function argument `$type`.

```
AWS_SMPS::STRING
```

```
AWS_SMPS::STRING_LIST
```

```
AWS_SMPS::SECURE_STRING
```

Get the version of `AWS_SMPS` using the class constant:

```
AWS_SMPS::VERSION
```
