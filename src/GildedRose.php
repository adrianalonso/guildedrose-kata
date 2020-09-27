<?php

namespace Runroom\GildedRose;

const MAX_QUALITY = 50;
const MIN_QUALITY = 0;

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
                if ($item->quality > MIN_QUALITY) {
                    $item->decrementQuality();
                }
            }

            if ($item->isAgedBrie() || $item->isBackstage()) {
                if ($item->quality < MAX_QUALITY) {
                    $item->incrementQuality();
                }
            }

            if ($item->isBackstage()) {
                if ($item->sell_in < 11 && $item->quality < MAX_QUALITY) {
                    $item->incrementQuality();
                }
                if ($item->sell_in < 6 && $item->quality < MAX_QUALITY) {
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

                if ($item->quality > 0 && $item->isOrdinaryItem()) {
                    $item->decrementQuality();
                }


                if ($item->isAgedBrie() && $item->quality < MAX_QUALITY) {
                    $item->incrementQuality();
                }
            }
        }
    }
}
