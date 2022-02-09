<?php
declare(strict_types=1);


class PhoneInfo extends BaseInfo
{
    /**
     * @inheritDoc
     */
    protected function getAdditionalInfo(): string
    {
        return "вбудована пам'ять: {$this->shopProduct->getMemory()}";
    }
}
