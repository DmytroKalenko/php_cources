<?php
declare(strict_types=1);
namespace ShopProduct;
class ShopProductWriter
{
    /**
     * @param ShopProduct $shopProduct
     *
     * @return string
     */
    public static function getShopProductInfo(ShopProduct $shopProduct): string
    {
        $preparedInfo = $shopProduct->getInfo()->__toString();

        return self::wrapInfoIntoDiv($preparedInfo);
    }

    /**
     * @param string $productInfo
     *
     * @return string
     */
    private static function wrapInfoIntoDiv(string $productInfo): string
    {
        return "<div>$productInfo</div>";
    }
}
