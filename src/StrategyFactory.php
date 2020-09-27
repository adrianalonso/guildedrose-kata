<?php

namespace Runroom\GildedRose;

class StrategyFactory
{
    public function buildStrategy(Item $item): ?UpdateQualityStrategy
    {
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

        return $strategy;
    }
}
