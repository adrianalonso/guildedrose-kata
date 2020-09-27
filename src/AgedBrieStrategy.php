<?php

namespace Runroom\GildedRose;

class AgedBrieStrategy extends UpdateQualityStrategy
{
    public function updateQuality(): void
    {
        $this->item->incrementQuality();
        $this->item->decrementSellin();
        if ($this->item->isSellinLessThanZero()) {
            $this->item->incrementQuality();
        }
    }
}
