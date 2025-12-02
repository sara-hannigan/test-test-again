<?php

declare(strict_types=1);

namespace SaraOnboarded\Auth;

use SaraOnboarded\Core\Attributes\Api;
use SaraOnboarded\Core\Concerns\SdkModel;
use SaraOnboarded\Core\Concerns\SdkParams;
use SaraOnboarded\Core\Contracts\BaseModel;

/**
 * Create a new user account.
 *
 * @see SaraOnboarded\Services\AuthService::register()
 *
 * @phpstan-type AuthRegisterParamsShape = array{
 *   email: string, password: string, name?: string
 * }
 */
final class AuthRegisterParams implements BaseModel
{
    /** @use SdkModel<AuthRegisterParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $email;

    #[Api]
    public string $password;

    #[Api(optional: true)]
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
        $obj = new self;

        $obj->email = $email;
        $obj->password = $password;

        null !== $name && $obj->name = $name;

        return $obj;
    }

    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }

    public function withPassword(string $password): self
    {
        $obj = clone $this;
        $obj->password = $password;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
