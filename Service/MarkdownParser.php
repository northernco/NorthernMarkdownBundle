<?php

namespace Northern\MarkdownBundle\Service;

use Symfony\Component\HtmlSanitizer\HtmlSanitizer;
use Symfony\Component\HtmlSanitizer\HtmlSanitizerConfig;

class MarkdownParser implements MarkdownParserInterface
{
    private \Parsedown $parsedown;

    private HtmlSanitizer $sanitizer;

    public function __construct()
    {
        $this->parsedown = new \Parsedown();

        $sanitizerConfig = new HtmlSanitizerConfig();
        $sanitizerConfig = $sanitizerConfig->withMaxInputLength(1_000_000);
        $sanitizerConfig = $sanitizerConfig->allowSafeElements();
        $sanitizerConfig = $sanitizerConfig->allowAttribute('class', '*');
        $sanitizerConfig = $sanitizerConfig->allowAttribute('style', '*');

        $this->sanitizer = new HtmlSanitizer($sanitizerConfig);
    }

    public function convertMarkdownToHtml(string $markdown): string
    {
        $html = $this->parsedown->text($markdown);
        $html = $this->sanitizer->sanitize($html);

        return $html;
    }
}
