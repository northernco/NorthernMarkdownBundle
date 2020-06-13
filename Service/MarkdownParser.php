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
                    'th'   => ['allowed_attributes' => ['style']],
                    'td'   => ['allowed_attributes' => ['style']],
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
