<?php

namespace Northern\MarkdownBundle\Twig\Extension;

class MarkdownExtension extends \Twig\Extension\AbstractExtension
{
    private $markdownRepository;

    public function __construct(\Northern\MarkdownBundle\Service\MarkdownRepositoryInterface $markdownRepository)
    {
        $this->markdownRepository = $markdownRepository;
    }

    public function getFilters(): array
    {
        return [
            new \Twig\TwigFilter('md2html', [$this, 'markdownToHtml'], ['is_safe' => ['html']]),
        ];
    }

    public function markdownToHtml(string $text): string
    {
        return $this->markdownRepository->getHtmlFromMarkdown($text);
    }
}
