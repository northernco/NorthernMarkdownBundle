<?php

declare(strict_types=1);

namespace Northern\MarkdownBundle\Service;

class Parsedown extends \Parsedown
{
    /**
     * @param array<string, mixed> $line
     * @return array<string, mixed>|null
     */
    protected function blockList($line): ?array
    {
        $block = parent::blockList($line);

        if ($block === null) {
            return null;
        }

        if (isset($block['li']['text'][0])) {
            $block['li']['text'][0] = $this->processCheckbox($block['li']['text'][0]);
        }

        return $block;
    }

    /**
     * @param array<string, mixed> $line
     * @param array<string, mixed> $block
     * @return array<string, mixed>|null
     */
    protected function blockListContinue($line, array $block): ?array
    {
        $block = parent::blockListContinue($line, $block);

        if ($block === null) {
            return null;
        }

        if (isset($block['li']['text'][0])) {
            $block['li']['text'][0] = $this->processCheckbox($block['li']['text'][0]);
        }

        return $block;
    }

    private function processCheckbox(string $text): string
    {
        if (preg_match('/^\[([ xX])\]\s*(.*)$/s', $text, $matches)) {
            $checked = strtolower($matches[1]) === 'x';
            $content = $matches[2];

            $checkbox = '<input type="checkbox" class="markdown-checkbox"';
            if ($checked) {
                $checkbox .= ' checked';
            }
            $checkbox .= '>';

            return $checkbox . ' ' . $content;
        }

        return $text;
    }
}
