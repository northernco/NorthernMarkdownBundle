<?php

namespace Northern\MarkdownBundle\Service;

class Parsedown extends \Parsedown
{
    protected function blockListComplete(array $Block): ?array
    {
        $list = parent::blockListComplete($Block);

        if (!isset($list)) {
            return null;
        }

        foreach ($list['element'] as $key => $listItem) {
            if (\is_array($listItem)) {
                foreach ($listItem as $inList => $items) {
                    $firstThree    = \strtolower(\substr($items['text'][0], 0, 3));
                    $remainingText = \trim(\substr($items['text'][0], 3));

                    if ($firstThree === '[x]' || $firstThree === '[ ]') {
                        $list['element'][$key][$inList]['text'][0] = '<input type="checkbox" ' . ($firstThree === '[x]' ? 'checked' : '') . '> ' . $remainingText;
                    }
                }
            }
        }

        return $list;
    }
}
