<?php

namespace Runroom\GildedRose;

abstract class UpdateQualityStrategy
{

    /**
     * @var Item
     */
    protected $item;

    /**
     * UpdateQualityStrategy constructor.
     * @param Item $item
     */
    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    abstract public function updateQuality(): void;
}
