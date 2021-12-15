<?php

namespace Northern\MarkdownBundle\Service;

use Symfony\Contracts\Cache\CacheInterface;

class MarkdownRepository implements MarkdownRepositoryInterface
{
    private MarkdownParserInterface $parser;

    private CacheInterface $cache;

    public function __construct(MarkdownParserInterface $parser, CacheInterface $cache)
    {
        $this->parser = $parser;
        $this->cache  = $cache;
    }

    public function getHtmlFromMarkdown(string $markdown): string
    {
        return $this->getCachedHtmlFromMarkdown($markdown);
    }

    private function getCachedHtmlFromMarkdown(string $markdown): string
    {
        $key = $this->generateCacheKey($markdown);

        return $this->cache->get(
            $key,
            function () use ($markdown) {
                return $this->parser->convertMarkdownToHtml($markdown);
            }
        );
    }

    private function generateCacheKey(string $text): string
    {
        return \hash('sha256', $text);
    }
}
