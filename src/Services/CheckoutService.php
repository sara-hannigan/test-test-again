<?php

declare(strict_types=1);

namespace SaraOnboarded\Services;

use SaraOnboarded\Checkout\Order;
use SaraOnboarded\Client;
use SaraOnboarded\Core\Exceptions\APIException;
use SaraOnboarded\Core\Util;
use SaraOnboarded\RequestOptions;
use SaraOnboarded\ServiceContracts\CheckoutContract;

/**
 * @phpstan-import-type RequestOpts from \SaraOnboarded\RequestOptions
 */
final class CheckoutService implements CheckoutContract
{
    /**
     * @api
     */
    public CheckoutRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CheckoutRawService($client);
    }

    /**
     * @api
     *
     * Checkout and place order
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createOrder(
        string $addressID,
        string $paymentMethodID,
        RequestOptions|array|null $requestOptions = null,
    ): Order {
        $params = Util::removeNulls(
            ['addressID' => $addressID, 'paymentMethodID' => $paymentMethodID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createOrder(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
