<?php
class Tools extends ToolsCore
{
    public static function displayPrice($price, $currency = null, $no_utf8 = false, Context $context = null)
    {
        if ($context === null) {
            $context = Context::getContext();
        }

        if ($currency === null) {
            $currency = $context->currency;
        }

        if (is_int($currency)) {
            $currency = Currency::getCurrencyInstance((int) $currency);
        }

        // The modification starts here
        if ($currency->iso_code === 'BGN') {
            // First, get the standard price display in BGN
            $bgnPrice = parent::displayPrice($price, $currency, $no_utf8, $context);

            // Check if the price string already contains the EUR symbol.
            // mb_strpos is used for multi-byte character safety.
            if (mb_strpos($bgnPrice, '€') !== false) {
                // If it does, it means the price has already been processed. Return it as is.
                return $bgnPrice;
            }

            // If no EUR symbol is found, proceed with the conversion
            $eurPrice = $price / 1.95583;

            // Get the currency object for EUR to format the price correctly
            $eurCurrency = new Currency(Currency::getIdByIsoCode('EUR'));
            $eurFormattedPrice = parent::displayPrice($eurPrice, $eurCurrency, $no_utf8, $context);

            // Return the combined price string
            return $bgnPrice . ' - ' . $eurFormattedPrice;
        }
        // End of modification

        // For any other currency, use the default PrestaShop behavior
        return parent::displayPrice($price, $currency, $no_utf8, $context);
    }
}