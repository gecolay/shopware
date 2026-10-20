<?php declare(strict_types=1);

namespace Shopware\Core\System\SalesChannel\Event;

use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\Event\ShopwareSalesChannelEvent;
use Shopware\Core\Framework\Log\Package;
use Shopware\Core\System\SalesChannel\SalesChannelContext;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * @codeCoverageIgnore
 */
#[Package('framework')]
class SalesChannelContextSessionTokenChangeEvent extends Event implements ShopwareSalesChannelEvent
{
    /**
     * @param SessionToken $previousToken
     * @param SessionToken $currentToken
     */
    public function __construct(
        protected SalesChannelContext $salesChannelContext,
        protected string $previousToken,
        protected string $currentToken
    ) {
    }

    public function getSalesChannelContext(): SalesChannelContext
    {
        return $this->salesChannelContext;
    }

    public function getContext(): Context
    {
        return $this->salesChannelContext->getContext();
    }

    /**
     * @return SessionToken
     */
    public function getPreviousToken(): string
    {
        return $this->previousToken;
    }

    /**
     * @return SessionToken
     */
    public function getCurrentToken(): string
    {
        return $this->currentToken;
    }
}
