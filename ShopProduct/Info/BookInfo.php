<?php
declare(strict_types=1);


class BookInfo extends BaseInfo
{
    /**
     * @inheritDoc
     */
    protected function getAdditionalInfo(): string
    {
        return "кількість сторінок: {$this->shopProduct->getPagesCount()}";
    }
}
