<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class DiscordNotifier
{
    protected $webhookUrl;

    public function __construct()
    {
        $this->webhookUrl = config('services.discord.webhook_url');
    }

    public function sendMessage(string $message)
    {
        $data = ['content' => $message];
        $this->sendRequest($data);
    }

    public function sendEmbed(array $embed)
    {
        $data = ['embeds' => [$embed]];
        $this->sendRequest($data);
    }

    protected function sendRequest(array $data)
    {
        $response = Http::withOptions(['verify' => false])
        ->withHeaders(['Content-Type' => 'application/json'])
        ->post($this->webhookUrl, $data);

        if ($response->failed()) {
            \Log::error('Error al enviar mensaje a Discord', ['response' => $response->body()]);
        }
    }
}
