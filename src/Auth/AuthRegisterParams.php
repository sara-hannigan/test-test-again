<?php

declare(strict_types=1);

namespace SaraOnboarded\Auth;

use SaraOnboarded\Core\Attributes\Optional;
use SaraOnboarded\Core\Attributes\Required;
use SaraOnboarded\Core\Concerns\SdkModel;
use SaraOnboarded\Core\Concerns\SdkParams;
use SaraOnboarded\Core\Contracts\BaseModel;

/**
 * Create a new user account.
 *
 * @see SaraOnboarded\Services\AuthService::register()
 *
 * @phpstan-type AuthRegisterParamsShape = array{
 *   email: string, password: string, name?: string|null
 * }
 */
final class AuthRegisterParams implements BaseModel
{
    /** @use SdkModel<AuthRegisterParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $email;

    #[Required]
    public string $password;

    #[Optional]
    public ?string $name;

    /**
     * `new AuthRegisterParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AuthRegisterParams::with(email: ..., password: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AuthRegisterParams)->withEmail(...)->withPassword(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        string $email,
        string $password,
        ?string $name = null
    ): self {
        $self = new self;

        $self['email'] = $email;
        $self['password'] = $password;

        null !== $name && $self['name'] = $name;

        return $self;
    }

    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    public function withPassword(string $password): self
    {
        $self = clone $this;
        $self['password'] = $password;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
