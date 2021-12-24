<?php

namespace Northern\MarkdownBundle\Twig\Extension;

use Northern\MarkdownBundle\Service\MarkdownRepositoryInterface;
use Twig\Extension\RuntimeExtensionInterface;

class MarkdownRuntime implements RuntimeExtensionInterface
{
    private MarkdownRepositoryInterface $markdownRepository;

    public function __construct(MarkdownRepositoryInterface $markdownRepository)
    {
        $this->markdownRepository = $markdownRepository;
    }

    public function markdownToHtml(string $text): string
    {
        return $this->markdownRepository->getHtmlFromMarkdown($text);
    }
}
