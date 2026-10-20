<?php declare(strict_types=1);

namespace Shopware\Core\System\SalesChannel\Context;

use Shopware\Core\Framework\Log\Package;
use Shopware\Core\Framework\Util\Random;

#[Package('framework')]
class SalesChannelContextSessionService
{
    /**
     * Generate a new sales channel context session token.
     *
     * @return SessionToken
     */
    public static function getNewToken(): string
    {
        /** @var SessionToken */
        return Random::getAlphanumericString(32);
    }
}
