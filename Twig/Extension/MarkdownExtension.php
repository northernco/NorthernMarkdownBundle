<?php

namespace Northern\MarkdownBundle\Twig\Extension;

class MarkdownExtension extends \Twig\Extension\AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new \Twig\TwigFilter('md2html', [MarkdownRuntime::class, 'markdownToHtml'], ['is_safe' => ['html']]),
        ];
    }
}
