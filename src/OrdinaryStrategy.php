<?php

namespace Runroom\GildedRose;

class OrdinaryStrategy extends UpdateQualityStrategy
{
    public function updateQuality(): void
    {
        $this->item->decrementQuality();
        $this->item->decrementSellin();

        if ($this->item->isSellinLessThanZero()) {
            $this->item->decrementQuality();
        }
    }
}
