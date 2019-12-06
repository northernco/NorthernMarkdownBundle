<?php

namespace Northern\MarkdownBundle\Service;

class MarkdownParser implements MarkdownParserInterface
{
    private $parsedown;

    public function __construct()
    {
        $this->parsedown = new \Parsedown();
    }

    public function convertMarkdownToHtml(string $markdown): string
    {
        return $this->parsedown->text($markdown);
    }
}
