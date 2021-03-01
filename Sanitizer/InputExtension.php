<?php

namespace Northern\MarkdownBundle\Sanitizer;

use HtmlSanitizer\Extension\ExtensionInterface;

class InputExtension implements ExtensionInterface
{
    public function getName(): string
    {
        return 'input';
    }

    public function createNodeVisitors(array $config = []): array
    {
        return [
            'input' => new InputNodeVisitor(),
        ];
    }
}
