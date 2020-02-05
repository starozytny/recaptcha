Installation
============

Make sure Composer is installed globally, as explained in the
[installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Applications that use Symfony Flex
----------------------------------

Open a command console, enter your project directory and execute:

```console
$ composer require shanbo/recaptcha
```

Create recaptcha.yaml
----------------------------------

```console
recaptcha:
  key: '%env(GOOGLE_RECAPTCHA_KEY)%'
  secret: '%env(GOOGLE_RECAPTCHA_SECRET)%'
```

Add to your .env
----------------------------------

```console
GOOGLE_RECAPTCHA_KEY=
GOOGLE_RECAPTCHA_SECRET=
```
