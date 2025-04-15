<?php

declare(strict_types=1);

namespace Modules\Xot\Exceptions\Formatters;

use Illuminate\Support\Facades\Auth;

class WebhookErrorFormatter
{
<<<<<<< HEAD
    public function __construct(private readonly \Throwable $exception)
    {
    }

=======
    public function __construct(
        private \Throwable $exception
    ) {}

    /**
     * @return array<string, mixed>
     */
>>>>>>> origin/dev
    public function format(): array
    {
        $user = Auth::user();
        $email = $user->email ?? 'CLI User';

        return [
<<<<<<< HEAD
=======
            'message' => $this->exception->getMessage(),
            'file' => $this->exception->getFile(),
            'line' => $this->exception->getLine(),
            'trace' => $this->exception->getTraceAsString(),
>>>>>>> origin/dev
            'exception' => sprintf(
                '`%s` (Code `%s`)',
                get_class($this->exception),
                $this->exception->getCode()
            ),
            'thrown_in' => sprintf(
                '`%s`:%d',
                $this->exception->getFile(),
                $this->exception->getLine()
            ),
            'user' => sprintf('%d <%s>', Auth::id() ?? 0, $email),
            'ip' => request()->ip(),
            'thrown_while_calling' => sprintf(
                '[%s] %s',
                request()->getMethod(),
                request()->fullUrl()
            ),
            'url_previous' => url()->previous(),
            /*
            'exception_details' => sprintf(
                "Trace:\n```json \n %s \n ```\n\n Previous: \n `%s`",
                json_encode($this->exception->getTrace(), JSON_PRETTY_PRINT),
                $this->exception->getPrevious() ? ('`' . get_class($this->exception->getPrevious()) . '`') : 'None'
            ),
            */
        ];
    }
}
