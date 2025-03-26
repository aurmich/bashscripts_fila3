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
        return $this->authentications()->first();
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
        return $latestAuth ? $latestAuth->login_at : null;
    }

    /**
     * Get the timestamp of the most recent successful login attempt.
     *
     * @return ?Carbon the timestamp of the last successful login or null if none exists
     */
    public function lastSuccessfulLoginAt(): ?Carbon
    {
        $latestAuth = $this->authentications()->first();
        return $latestAuth ? $latestAuth->login_at : null;
    }

    /**
     * Get the IP address of the most recent login attempt.
     *
     * @return ?string the IP address of the last login or null if none exists
     */
    public function lastLoginIp(): ?string
    {
        $latestAuth = $this->latestAuthentication();
        return $latestAuth ? $latestAuth->ip_address : null;
    }

    /**
     * Get the IP address of the most recent successful login attempt.
     *
     * @return ?string the IP address of the last successful login or null if none exists
     */
    public function lastSuccessfulLoginIp(): ?string
    {
        $latestAuth = $this->authentications()->first();
        return $latestAuth ? $latestAuth->ip_address : null;
    }

    /**
     * Get the timestamp of the second most recent login attempt (previous login).
     *
     * @return ?Carbon the timestamp of the previous login or null if less than two logins exist
     */
    public function previousLoginAt(): ?Carbon
    {
        $previousAuth = $this->authentications()->skip(1)->first();
        return $previousAuth ? $previousAuth->login_at : null;
    }

    /**
     * Get the IP address of the second most recent login attempt (previous login).
     *
     * @return ?string the IP address of the previous login or null if less than two logins exist
     */
    public function previousLoginIp(): ?string
    {
        $previousAuth = $this->authentications()->skip(1)->first();
        return $previousAuth ? $previousAuth->ip_address : null;
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

    public function getAuthenticationLogsAttribute(): array
    {
        return [
            'total_attempts' => $this->authentications()->whereDate('login_at', Carbon::today())->count(),
            'total_failed_attempts' => $this->authentications()->whereDate('login_at', Carbon::today())->where('login_successful', false)->count(),
        ];
    }
}
