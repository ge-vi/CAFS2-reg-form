<?php

class Participant
{
    private string $fName;
    private string $lName;
    private string $city;
    private array $langs;
    private string $info;
    private string $image;

    public function __construct(
        string $fName,
        string $lName,
        string $city,
        array  $langs,
        string $info,
        string $image
    )
    {
        $this->fName = $fName;
        $this->lName = $lName;
        $this->city = $city;
        $this->langs = $langs;
        $this->info = $info;
        $this->image = $image;
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
     * @return array
     */
    public function getLangs(): array
    {
        return $this->langs;
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

}
