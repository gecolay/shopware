<?php declare(strict_types=1);

namespace Shopware\Core\System\SalesChannel;

use Shopware\Core\Framework\DataAbstractionLayer\FieldVisibility;
use Shopware\Core\Framework\Log\Package;
use Shopware\Core\Framework\Struct\StateAwareTrait;
use Shopware\Core\Framework\Struct\Struct;

#[Package('framework')]
class SalesChannelContextSession extends Struct
{
    use StateAwareTrait;

    /**
     * @internal
     *
     * @param SessionToken $token
     * @param array<string, mixed> $payload
     */
    public function __construct(
        protected string $token,
        protected ?string $imitatingUserId = null,
        protected array $payload = [],
    ) {
    }

    /**
     * @return SessionToken
     */
    public function getToken(): string
    {
        /**
         * @see SwTwigFunction::getAttribute
         * Inside Twig rendering context, the session token is not allowed to be accessed as it might expose sensitive information when the data is dumped into outputted HTML.
         */
        if (FieldVisibility::$isInTwigRenderingContext) {
            throw SalesChannelException::contextTokenNotAccessible();
        }

        return $this->token;
    }

    public function getImitatingUserId(): ?string
    {
        return $this->imitatingUserId;
    }

    public function setImitatingUserId(?string $imitatingUserId): void
    {
        $this->imitatingUserId = $imitatingUserId;
    }

    /**
     * @return array<string, mixed>
     */
    public function getPayload(): array
    {
        return $this->payload;
    }

    /**
     * @param array<string, mixed> $payload
     */
    public function setPayload(array $payload): void
    {
        $this->payload = $payload;
    }
}
