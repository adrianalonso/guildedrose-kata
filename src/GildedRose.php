<?php

namespace Runroom\GildedRose;

/**
 * Class GildedRose
 * @package Runroom\GildedRose
 */
class GildedRose
{
    /**
     * @var Item[]
     */
    private $items;

    /**
     * @var StrategyFactory
     */
    private $factory;

    /**
     * GildedRose constructor.
     * @param Item[] $items
     */
    public function __construct($items)
    {
        $this->items = $items;
        $this->factory = new StrategyFactory();
    }

    public function update_quality(): void
    {
        /** @var Item $item */
        foreach ($this->items as $item) {
            $strategy = $this->factory->buildStrategy($item);

            if (null !== $strategy) {
                $strategy->updateQuality();
            }
        }
    }
}
