<?php

namespace Runroom\GildedRose;

class GildedRose
{
    private $items;

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function update_quality()
    {
        /** @var Item $item */
        foreach ($this->items as $item) {
            if ($item->isOrdinaryItem()) {
                $item->decrementQuality();
            }

            if ($item->isAgedBrie() || $item->isBackstage()) {
                $item->incrementQuality();
            }

            if ($item->isBackstage()) {
                if ($item->sell_in < 11) {
                    $item->incrementQuality();
                }
                if ($item->sell_in < 6) {
                    $item->incrementQuality();
                }
            }

            if (!$item->isSulfuras()) {
                $item->decrementSellin();
            }

            if ($item->isSellinLessThanZero()) {
                if ($item->isBackstage()) {
                    $item->quality = $item->quality - $item->quality;
                }

                if ($item->isOrdinaryItem()) {
                    $item->decrementQuality();
                }

                if ($item->isAgedBrie()) {
                    $item->incrementQuality();
                }
            }
        }
    }
}
