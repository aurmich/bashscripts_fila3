<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\User\Models\AuthenticationLog;

/**
 * Trait HasAuthenticationLogTrait.
 *
 * This trait provides functionality for logging authentication events for any model that uses it.
 * It includes methods for retrieving the latest authentication logs, login timestamps, IP addresses,
 * and other related information, including tracking consecutive login days.
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\AuthenticationLog> $authentications
 * @property-read string|null $login_at The timestamp of the last login.
 * @property-read string|null $ip_address The IP address of the last login.
 * @property-read string|null $location The location of the last login.
 * @property-read string|null $user_agent The user agent of the last login.
 * @property-read string|null $device The device of the last login.
 * @property-read string|null $platform The platform of the last login.
 *
 * @method \Illuminate\Database\Eloquent\Relations\HasMany<\Modules\User\Models\AuthenticationLog> authentications()
 * @method \Modules\User\Models\AuthenticationLog|null latestAuthentication()
 */
trait HasAuthenticationLogTrait
{
    /**
     * Get all of the model's authentication logs.
     *
     * @return HasMany<AuthenticationLog>
     */
    public function authentications(): HasMany
    {
        return $this->hasMany(AuthenticationLog::class);
    }

    /**
     * Get the latest authentication attempt for the model.
     *
     * @return AuthenticationLog|null
     */
    public function latestAuthentication(): ?AuthenticationLog
    {
        return $this->authentications()->latest()->first();
    }

    /**
     * Specify how to notify about authentication logs.
     *
     * @return list<string> a list of notification channels
     */
    public function notifyAuthenticationLogVia(): array
    {
        return ['mail'];
    }

    /**
     * Get the timestamp of the most recent login attempt.
     *
     * @return ?Carbon the timestamp of the last login or null if none exists
     */
    public function lastLoginAt(): ?Carbon
    {
        $latestAuth = $this->latestAuthentication();
        return $latestAuth?->login_at;
    }

    /**
     * Get the timestamp of the most recent successful login attempt.
     *
     * @return ?Carbon the timestamp of the last successful login or null if none exists
     */
    public function lastSuccessfulLoginAt(): ?Carbon
    {
        /** @var AuthenticationLog|null */
        $latestAuth = $this->authentications()->where('login_successful', true)->latest()->first();
        return $latestAuth?->login_at;
    }

    /**
     * Get the IP address of the most recent login attempt.
     *
     * @return ?string the IP address of the last login or null if none exists
     */
    public function lastLoginIp(): ?string
    {
        $latestAuth = $this->latestAuthentication();
        return $latestAuth?->ip_address;
    }

    /**
     * Get the IP address of the most recent successful login attempt.
     *
     * @return ?string the IP address of the last successful login or null if none exists
     */
    public function lastSuccessfulLoginIp(): ?string
    {
        /** @var AuthenticationLog|null */
        $latestAuth = $this->authentications()->where('login_successful', true)->latest()->first();
        return $latestAuth?->ip_address;
    }

    /**
     * Get the timestamp of the second most recent login attempt (previous login).
     *
     * @return ?Carbon the timestamp of the previous login or null if less than two logins exist
     */
    public function previousLoginAt(): ?Carbon
    {
        /** @var AuthenticationLog|null */
        $previousAuth = $this->authentications()->latest()->skip(1)->first();
        return $previousAuth?->login_at;
    }

    /**
     * Get the IP address of the second most recent login attempt (previous login).
     *
     * @return ?string the IP address of the previous login or null if less than two logins exist
     */
    public function previousLoginIp(): ?string
    {
        /** @var AuthenticationLog|null */
        $previousAuth = $this->authentications()->latest()->skip(1)->first();
        return $previousAuth?->ip_address;
    }

    /**
     * Calculate the number of consecutive days the user has logged in.
     *
     * @return int the number of consecutive days the user has logged in
     */
    public function consecutiveDaysLogin(): int
    {
        return once(function (): int {
            $date = Carbon::now();
            $days = 0;

            // Count the logins for the current day.
            $count = $this->authentications()->whereDate('login_at', $date)->count();

            while ($count > 0) {
                $date = $date->subDay();
                $count = $this->authentications()->whereDate('login_at', $date)->count();
                $days++;
            }

            return $days;
        });
    }

    /**
     * Get the authentication logs attribute.
     *
     * @return array<string, int>
     */
    public function getAuthenticationLogsAttribute(): array
    {
        return [
            'total_attempts' => $this->authentications()->whereDate('login_at', Carbon::today())->count(),
            'total_failed_attempts' => $this->authentications()->whereDate('login_at', Carbon::today())->where('login_successful', false)->count(),
        ];
    }

    /**
     * Get the user's last login time.
     */
    public function getLastLoginAt(): ?Carbon
    {
        $log = $this->latestAuthentication();
        return $log?->created_at;
    }

    /**
     * Get the user's last login IP address.
     */
    public function getLastLoginIp(): ?string
    {
        $log = $this->latestAuthentication();
        return $log?->ip_address;
    }

    /**
     * Get the user's last login location.
     *
     * @return array<string, mixed>|null
     */
    public function getLastLoginLocation(): ?array
    {
        $log = $this->latestAuthentication();
        return $log?->location;
    }

    /**
     * Get the user's last login user agent.
     */
    public function getLastLoginUserAgent(): ?string
    {
        $log = $this->latestAuthentication();
        return $log?->user_agent;
    }

    /**
     * Get the user's last login device.
     */
    public function getLastLoginDevice(): ?string
    {
        $log = $this->latestAuthentication();
        return $log?->device;
    }

    /**
     * Get the user's last login platform.
     */
    public function getLastLoginPlatform(): ?string
    {
        $log = $this->latestAuthentication();
        return $log?->platform;
    }

    /**
     * Get the user's last login time.
     */
    public function getLoginAt(): ?Carbon
    {
        $log = $this->latestAuthentication();
        return $log?->created_at;
    }

    /**
     * Get the user's last login IP address.
     */
    public function getIpAddress(): ?string
    {
        $log = $this->latestAuthentication();
        return $log?->ip_address;
    }

    /**
     * Get the user's last login location.
     *
     * @return array<string, mixed>|null
     */
    public function getLocation(): ?array
    {
        $log = $this->latestAuthentication();
        return $log?->location;
    }

    /**
     * Get the user's last login user agent.
     */
    public function getUserAgent(): ?string
    {
        $log = $this->latestAuthentication();
        return $log?->user_agent;
    }

    /**
     * Get the user's last login device.
     */
    public function getDevice(): ?string
    {
        $log = $this->latestAuthentication();
        return $log?->device;
    }

    /**
     * Get the user's last login platform.
     */
    public function getPlatform(): ?string
    {
        $log = $this->latestAuthentication();
        return $log?->platform;
    }
}
