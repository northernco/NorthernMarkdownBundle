<?php

namespace Northern\MarkdownBundle\Service;

class MarkdownParser implements MarkdownParserInterface
{
    private $parsedown;

    private $sanitizer;

    public function __construct()
    {
        $this->parsedown = new \Parsedown();
        $this->sanitizer = \HtmlSanitizer\Sanitizer::create(
            [
                'extensions' => ['basic', 'list', 'table', 'image', 'code', 'extra'],
                'tags'       => [
                    'code' => ['allowed_attributes' => ['class']],
                ],
            ]
        );
    }

    public function convertMarkdownToHtml(string $markdown): string
    {
        $html = $this->parsedown->text($markdown);
        $html = $this->sanitizer->sanitize($html);

        return $html;
    }
}
