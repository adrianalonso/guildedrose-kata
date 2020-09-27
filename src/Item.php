<?php

namespace Runroom\GildedRose;

const MAX_QUALITY = 50;
const MIN_QUALITY = 0;


class Item
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var int
     */
    public $sell_in;

    /**
     * @var int
     */
    public $quality;

    public function __construct(string $name, int $sell_in, int $quality)
    {
        $this->name = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    public function __toString()
    {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }

    public function incrementQuality():void
    {
        if ($this->quality < MAX_QUALITY) {
            $this->quality++;
        }
    }

    public function decrementQuality():void
    {
        if ($this->quality > MIN_QUALITY) {
            $this->quality--;
        }
    }

    public function isAgedBrie():bool
    {
        return $this->name === 'Aged Brie';
    }

    public function isBackstage():bool
    {
        return $this->name === 'Backstage passes to a TAFKAL80ETC concert';
    }

    public function isSulfuras():bool
    {
        return $this->name === 'Sulfuras, Hand of Ragnaros';
    }

    public function isOrdinaryItem():bool
    {
        return !$this->isAgedBrie() && !$this->isSulfuras() && !$this->isBackstage();
    }

    public function decrementSellin():void
    {
        $this->sell_in--;
    }

    public function isSellinLessThanZero(): bool
    {
        return $this->sell_in < 0;
    }
}
