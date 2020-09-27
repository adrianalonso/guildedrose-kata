<?php

namespace Runroom\GildedRose;

class BackstageStrategy extends UpdateQualityStrategy
{
    public function updateQuality():void
    {
        $this->item->incrementQuality();

        if ($this->item->sell_in < 11) {
            $this->item->incrementQuality();
        }

        if ($this->item->sell_in < 6) {
            $this->item->incrementQuality();
        }

        $this->item->decrementSellin();

        if ($this->item->isSellinLessThanZero()) {
            $this->item->quality = $this->item->quality - $this->item->quality;
        }
    }
}
