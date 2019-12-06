<?php

namespace Northern\MarkdownBundle\Twig\Extension;

class MarkdownRuntime implements \Twig\Extension\RuntimeExtensionInterface
{
    private $markdownRepository;

    public function __construct(\Northern\MarkdownBundle\Service\MarkdownRepositoryInterface $markdownRepository)
    {
        $this->markdownRepository = $markdownRepository;
    }

    public function markdownToHtml(string $text): string
    {
        return $this->markdownRepository->getHtmlFromMarkdown($text);
    }
}
