<?php

namespace Northern\MarkdownBundle\Service;

interface MarkdownRepositoryInterface
{
    public function getHtmlFromMarkdown(string $markdown): string;
}
