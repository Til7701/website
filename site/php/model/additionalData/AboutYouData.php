<?php

namespace model\additionalData;

class AboutYouData
{
    private string $ipAddress;
    private int $port;

    public function __construct(string $ipAddress, int $port)
    {
        $this->ipAddress = $ipAddress;
        $this->port = $port;
    }

    public function getIpAddress(): string
    {
        return $this->ipAddress;
    }

    public function getPort(): int
    {
        return $this->port;
    }

}
