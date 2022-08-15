<?php

class ParticipantDTO
{
    public function __construct(
        protected string $fName,
        protected string $lName,
        protected string $city,
        protected array  $langs,
        protected string $info,
        protected string $image
    )
    {
        // Constructor property promotion
        // https://stitcher.io/blog/constructor-promotion-in-php-8
    }

    /**
     * @return string
     */
    public function getFName(): string
    {
        return $this->fName;
    }

    /**
     * @return string
     */
    public function getLName(): string
    {
        return $this->lName;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getLangs(): string
    {
        return implode(' ', $this->langs);
    }

    /**
     * @return string
     */
    public function getInfo(): string
    {
        return $this->info;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $imgPath
     * @return void
     */
    public function setImage(string $imgPath): void
    {
        $this->image = $imgPath;
    }

}
