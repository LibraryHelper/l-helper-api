<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LogService
{
    protected const BASE_URL = 'https://api.telegram.org/bot';

    public function __construct(protected string|null $botToken = null, protected string|null $channel = null)
    {
        $this->botToken = config('logging.logger_bot_token');
        $this->channel = config('logging.logger_chat_id');
    }

    public static function sendLog(Request $request, $errorMessage, $file, $line): void
    {
        $service = new self();
        $base_url = self::BASE_URL . $service->botToken . '/sendMessage';

        $message = "⚠️ Error: " . $errorMessage . "\n\n" . "📄 File: " . $file . "\n\n" . "➖ Line: " . $line;
        $message .= "\n\n" . "🔗 URL: " . $request->fullUrl();
        $message .= "\n\n" . "🖥️ User Agent: " . $request->userAgent();
        $message .= "\n\n" . "📡 Method: " . $request->method();
        if ($request->method() === 'POST') {
            $message .= "\n\n" . "📥 Request Data: " . json_encode($request->all());
        }
        Http::post($base_url, [
            'chat_id' => $service->channel,
            'text' => $message,
        ]);
    }
}
