<?php

namespace Northern\MarkdownBundle\Service;

use HtmlSanitizer\Sanitizer;
use HtmlSanitizer\SanitizerInterface;

class MarkdownParser implements MarkdownParserInterface
{
    private \Parsedown $parsedown;

    private SanitizerInterface $sanitizer;

    public function __construct()
    {
        $this->parsedown = new \Parsedown();
        $this->sanitizer = Sanitizer::create(
            [
                'max_input_length' => 1000000,
                'extensions'       => ['basic', 'list', 'table', 'image', 'code', 'extra'],
                'tags'             => [
                    'a'    => [
                        'allowed_schemes'    => ['http', 'https', null],
                        'allowed_attributes' => ['href', 'name', 'title'],
                    ],
                    'code' => ['allowed_attributes' => ['class']],
                    'em'   => ['allowed_attributes' => ['class']],
                    'th'   => ['allowed_attributes' => ['style']],
                    'td'   => ['allowed_attributes' => ['style']],
                    'h1'   => [
                        'allowed_attributes' => ['id', 'name'],
                    ],
                    'h2'   => [
                        'allowed_attributes' => ['id', 'name'],
                    ],
                    'h3'   => [
                        'allowed_attributes' => ['id', 'name'],
                    ],
                    'h4'   => [
                        'allowed_attributes' => ['id', 'name'],
                    ],
                    'h5'   => [
                        'allowed_attributes' => ['id', 'name'],
                    ],
                    'h6'   => [
                        'allowed_attributes' => ['id', 'name'],
                    ],
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
