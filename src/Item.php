<?php

namespace Runroom\GildedRose;

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
        $this->quality++;
    }

    public function decrementQuality()
    {
        $this->quality--;
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
}
