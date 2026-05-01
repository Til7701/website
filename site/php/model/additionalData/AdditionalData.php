<?php

namespace model\additionalData;

class AdditionalData
{
    private ?AboutYouData $aboutYouData = null;

    public function getAboutYouData(): AboutYouData
    {
        return $this->aboutYouData;
    }

    public function setAboutYouData(AboutYouData $aboutYouData): void
    {
        $this->aboutYouData = $aboutYouData;
    }

}
