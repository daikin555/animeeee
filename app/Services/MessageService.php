<?php

namespace App\Services;

use App\Enums\Replace;

class MessageService
{
    /**
     * @param string $message
     * @return string
     */
    public function checkMessageType(string $message): string
    {
        return Replace::getDescription(Replace::searchMessage($message));
    }
}