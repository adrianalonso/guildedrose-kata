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
            if (!$item->isAgedBrie() && !$item->isBackstage()) {
                if ($item->quality > MIN_QUALITY && !$item->isSulfuras()) {
                    $item->decrementQuality();
                }
            } else {
                if ($item->quality < MAX_QUALITY) {
                    $item->quality = $item->quality + 1;
                    if ($item->isBackstage()) {
                        if ($item->sell_in < 11 && $item->quality < MAX_QUALITY) {
                            $item->incrementQuality();
                        }
                        if ($item->sell_in < 6 && $item->quality < MAX_QUALITY) {
                            $item->incrementQuality();
                        }
                    }
                }
            }

            if (!$item->isSulfuras()) {
                $item->sell_in = $item->sell_in - 1;
            }

            if ($item->sell_in < 0) {
                if (!$item->isAgedBrie()) {
                    if (!$item->isBackstage()) {
                        if ($item->quality > 0 && !$item->isSulfuras()) {
                            $item->decrementQuality();
                        }
                    } else {
                        $item->quality = $item->quality - $item->quality;
                    }
                } else {
                    if ($item->quality < MAX_QUALITY) {
                        $item->incrementQuality();
                    }
                }
            }
        }
    }
}
