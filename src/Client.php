<?php

declare(strict_types=1);

namespace SaraOnboarded;

use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use SaraOnboarded\Core\BaseClient;
use SaraOnboarded\Core\Util;
use SaraOnboarded\Services\AddressesService;
use SaraOnboarded\Services\AuthService;
use SaraOnboarded\Services\CartService;
use SaraOnboarded\Services\CheckoutService;
use SaraOnboarded\Services\OrdersService;
use SaraOnboarded\Services\ProductsService;

class Client extends BaseClient
{
    public string $apiKey;

    /**
     * @api
     */
    public AuthService $auth;

    /**
     * @api
     */
    public ProductsService $products;

    /**
     * @api
     */
    public CartService $cart;

    /**
     * @api
     */
    public CheckoutService $checkout;

    /**
     * @api
     */
    public OrdersService $orders;

    /**
     * @api
     */
    public AddressesService $addresses;

    public function __construct(?string $apiKey = null, ?string $baseUrl = null)
    {
        $this->apiKey = (string) ($apiKey ?? getenv('SARA_ONBOARDED_API_KEY'));

        $baseUrl ??= getenv(
            'SARA_ONBOARDED_BASE_URL'
        ) ?: 'https://api.demo-ecommerce.com/v1';

        $options = RequestOptions::with(
            uriFactory: Psr17FactoryDiscovery::findUriFactory(),
            streamFactory: Psr17FactoryDiscovery::findStreamFactory(),
            requestFactory: Psr17FactoryDiscovery::findRequestFactory(),
            transporter: Psr18ClientDiscovery::find(),
        );

        parent::__construct(
            // x-release-please-start-version
            headers: [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'User-Agent' => sprintf('sara-onboarded/PHP %s', '0.0.1'),
                'X-Stainless-Lang' => 'php',
                'X-Stainless-Package-Version' => '0.0.1',
                'X-Stainless-Arch' => Util::machtype(),
                'X-Stainless-OS' => Util::ostype(),
                'X-Stainless-Runtime' => php_sapi_name(),
                'X-Stainless-Runtime-Version' => phpversion(),
            ],
            // x-release-please-end
            baseUrl: $baseUrl,
            options: $options,
        );

        $this->auth = new AuthService($this);
        $this->products = new ProductsService($this);
        $this->cart = new CartService($this);
        $this->checkout = new CheckoutService($this);
        $this->orders = new OrdersService($this);
        $this->addresses = new AddressesService($this);
    }

    /** @return array<string,string> */
    protected function authHeaders(): array
    {
        return $this->apiKey ? ['Authorization' => "Bearer {$this->apiKey}"] : [];
    }
}
