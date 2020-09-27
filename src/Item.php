<?php

namespace Runroom\GildedRose;

const MAX_QUALITY = 50;
const MIN_QUALITY = 0;


class Item
{
    public $name;
    public $sell_in;
    public $quality;

    public function __construct($name, $sell_in, $quality)
    {
        $this->name = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    public function __toString()
    {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }

    public function incrementQuality()
    {
        if ($this->quality < MAX_QUALITY) {
            $this->quality++;
        }
    }

    public function decrementQuality()
    {
        if ($this->quality > MIN_QUALITY) {
            $this->quality--;
        }
    }

    public function isAgedBrie()
    {
        return $this->name === 'Aged Brie';
    }

    public function isBackstage()
    {
        return $this->name === 'Backstage passes to a TAFKAL80ETC concert';
    }

    public function isSulfuras()
    {
        return $this->name === 'Sulfuras, Hand of Ragnaros';
    }

    public function isOrdinaryItem()
    {
        return !$this->isAgedBrie() && !$this->isSulfuras() && !$this->isBackstage();
    }

    public function decrementSellin()
    {
        $this->sell_in--;
    }

    public function isSellinLessThanZero()
    {
        return $this->sell_in < 0;
    }
}
