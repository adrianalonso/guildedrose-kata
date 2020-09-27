<?php

namespace Runroom\GildedRose;

class GildedRose
{
    /**
     * @var Item[]
     */
    private $items;

    /**
     * GildedRose constructor.
     * @param Item[] $items
     */
    public function __construct($items)
    {
        $this->items = $items;
    }

    public function update_quality(): void
    {
        /** @var Item $item */
        foreach ($this->items as $item) {
            $strategy = null;
            if ($item->isOrdinaryItem()) {
                $strategy = new OrdinaryStrategy($item);
            }

            if ($item->isAgedBrie()) {
                $strategy = new AgedBrieStrategy($item);
            }

            if ($item->isBackstage()) {
                $strategy = new BackstageStrategy($item);
            }

            if ($strategy) {
                $strategy->updateQuality();
            }
        }
    }
}
