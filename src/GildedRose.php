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
                $this->handleOrdinaryItem($item);
            }

            if ($item->isAgedBrie()) {
                $this->handleAgedBrie($item);
            }

            if ($item->isBackstage()) {
                $this->handleBackstage($item);
            }
        }
    }

    private function handleOrdinaryItem(Item $item)
    {
        $item->decrementQuality();
        $item->decrementSellin();
        if ($item->isSellinLessThanZero()) {
            $item->decrementQuality();
        }
    }

    private function handleAgedBrie(Item $item)
    {
        $item->incrementQuality();
        $item->decrementSellin();
        if ($item->isSellinLessThanZero()) {
            $item->incrementQuality();
        }
    }

    private function handleBackstage(Item $item)
    {
        $item->incrementQuality();
        if ($item->sell_in < 11) {
            $item->incrementQuality();
        }
        if ($item->sell_in < 6) {
            $item->incrementQuality();
        }

        $item->decrementSellin();

        if ($item->isSellinLessThanZero()) {
            $item->quality = $item->quality - $item->quality;
        }
    }
}
