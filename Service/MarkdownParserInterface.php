<?php

namespace Northern\MarkdownBundle\Service;

interface MarkdownParserInterface
{
    public function convertMarkdownToHtml(string $markdown): string;
}
