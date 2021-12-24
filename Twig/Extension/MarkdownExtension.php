<?php

namespace Northern\MarkdownBundle\Twig\Extension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class MarkdownExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('md2html', [MarkdownRuntime::class, 'markdownToHtml'], ['is_safe' => ['html']]),
        ];
    }
}
