# Northern Markdown Bundle

Installation
============

Make sure Composer is installed globally, as explained in the
[installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Add Private Repository
----------------------

Add the repository in the JSON snippet below to `composer.json`

```json
"repositories": [
    {
        "type": "git",
        "url": "git@git.northern.co:symfony/NorthernMarkdownBundle.git"
    }
]
```

Applications that use Symfony Flex
----------------------------------

Open a command console, enter your project directory and execute:

```console
$ composer require northern/markdown-bundle
```

Applications that don't use Symfony Flex
----------------------------------------

### Step 1: Download the Bundle

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```console
$ composer require northern/markdown-bundle
```

### Step 2: Enable the Bundle

Then, enable the bundle by adding it to the list of registered bundles
in the `config/bundles.php` file of your project:

```php
// config/bundles.php

return [
    // ...
    Northern\MarkdownBundle\NorthernMarkdownBundle::class => ['all' => true],
];
```

Usage
=====

Once the bundle is installed, you can autowire a `MarkdownRepositoryInterface`
or `MarkdownParserInterface` into any service or controller. It's recommended
to use the `MarkdownRepositoryInterface` as this will cache the results to make
subsequent calls much faster.

Example:

```php
use Northern\MarkdownBundle\Service\MarkdownParserInterface;
use Northern\MarkdownBundle\Service\MarkdownRepositoryInterface;

class Service {
    private $parser;

    private $repository;

    public function __construct(
        MarkdownParserInterface $parser,
        MarkdownRepositoryInterface $repository
    ) {
        $this->parser     = $parser;
        $this->repository = $repository;
    }

    public function someMethod()
    {
        $text = '# Test';

        // Converts the markdown
        $html = $this->parser->convertMarkdownToHtml($text);
        // or convert and cache the markdown
        $html = $this->repository->getHtmlFromMarkdown($text);
    }
}
```

In Twig, you can use the `md2html` filter:

```twig
{{ markdown_string|md2html }}
```
