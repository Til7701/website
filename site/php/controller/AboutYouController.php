<?php

namespace controller;

use model\additionalData\AboutYouData;
use model\additionalData\AdditionalData;

class AboutYouController
{
    public function work(): string
    {
        $ipAddress = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
        $port = $_SERVER['REMOTE_PORT'] ?? -1;

        $aboutYouData = new AboutYouData($ipAddress, $port);

        $additionalData = new AdditionalData();
        $additionalData->setAboutYouData($aboutYouData);

        $post = new PostController("/about-you", $additionalData);
        return $post->work();
    }
}
