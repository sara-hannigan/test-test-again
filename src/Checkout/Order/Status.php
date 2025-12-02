<?php

declare(strict_types=1);

namespace SaraOnboarded\Checkout\Order;

enum Status: string
{
    case PENDING = 'pending';

    case CONFIRMED = 'confirmed';

    case SHIPPED = 'shipped';

    case DELIVERED = 'delivered';
}
