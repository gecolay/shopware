<?php declare(strict_types=1);

namespace Shopware\Core\Checkout\Customer\SalesChannel;

use Shopware\Core\Framework\Log\Package;
use Shopware\Core\Framework\Validation\DataBag\RequestDataBag;
use Shopware\Core\System\SalesChannel\ContextTokenResponse;
use Shopware\Core\System\SalesChannel\SalesChannelContext;

/**
 * This route can be used to logout all sessions of the current customer
 */
#[Package('checkout')]
abstract class AbstractLogoutAllRoute
{
    abstract public function getDecorated(): AbstractLogoutAllRoute;

    abstract public function logoutAll(SalesChannelContext $context, RequestDataBag $data): ContextTokenResponse;
}
