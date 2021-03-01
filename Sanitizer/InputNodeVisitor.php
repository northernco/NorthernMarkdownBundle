<?php

namespace Northern\MarkdownBundle\Sanitizer;

use HtmlSanitizer\Model\Cursor;
use HtmlSanitizer\Node\NodeInterface;
use HtmlSanitizer\Visitor\AbstractNodeVisitor;
use HtmlSanitizer\Visitor\IsChildlessTagVisitorTrait;
use HtmlSanitizer\Visitor\NamedNodeVisitorInterface;

class InputNodeVisitor extends AbstractNodeVisitor implements NamedNodeVisitorInterface
{
    use IsChildlessTagVisitorTrait;

    protected function getDomNodeName(): string
    {
        return 'input';
    }

    public function getDefaultAllowedAttributes(): array
    {
        return [
            'type',
        ];
    }

    protected function createNode(\DOMNode $domNode, Cursor $cursor): NodeInterface
    {
        return new InputNode($cursor->node);
    }
}
