<?php

declare(strict_types=1);

namespace SaraOnboarded\Auth;

use SaraOnboarded\Core\Attributes\Api;
use SaraOnboarded\Core\Concerns\SdkModel;
use SaraOnboarded\Core\Concerns\SdkParams;
use SaraOnboarded\Core\Contracts\BaseModel;

/**
 * Login and get access token.
 *
 * @see SaraOnboarded\Services\AuthService::login()
 *
 * @phpstan-type AuthLoginParamsShape = array{email: string, password: string}
 */
final class AuthLoginParams implements BaseModel
{
    /** @use SdkModel<AuthLoginParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $email;

    #[Api]
    public string $password;

    /**
     * `new AuthLoginParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AuthLoginParams::with(email: ..., password: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AuthLoginParams)->withEmail(...)->withPassword(...)
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
    public static function with(string $email, string $password): self
    {
        $obj = new self;

        $obj['email'] = $email;
        $obj['password'] = $password;

        return $obj;
    }

    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj['email'] = $email;

        return $obj;
    }

    public function withPassword(string $password): self
    {
        $obj = clone $this;
        $obj['password'] = $password;

        return $obj;
    }
}
