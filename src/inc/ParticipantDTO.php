<?php

class ParticipantDTO implements JsonSerializable
{
    protected string $firstName;
    protected string $lastName;
    protected string $city;
    protected array $langs;
    protected string $info;
    protected array $image;

    public function __construct()
    {
        // TODO what is "safe way" to check for "an uninitialized state"
        // does these help ???
        // https://stitcher.io/blog/php-8-nullsafe-operator
        // https://stitcher.io/blog/shorthand-comparisons-in-php#null-coalescing-operator
        $this->firstName = '';
        $this->lastName = '';
        $this->city = '';
        $this->langs = [];
        $this->info = '';
        $this->image = [];
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getLangs(): string
    {
        return implode(' ', $this->langs);
    }

    /**
     * @param array $langs
     */
    public function setLangs(array $langs): void
    {
        $this->langs = $langs;
    }

    /**
     * @return string
     */
    public function getInfo(): string
    {
        return $this->info;
    }

    /**
     * @param string $info
     */
    public function setInfo(string $info): void
    {
        $this->info = $info;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image['fs_path'];
    }

    /**
     * @return string
     */
    public function getImageUrl(): string
    {
        return $this->image['http_path'];
    }

    /**
     * @param array $imgPaths
     * @return void
     */
    public function setImage(array $imgPaths): void
    {
        $this->image = $imgPaths;
    }

    /**
     * @param string $imgPath
     * @return void
     */
    public function setImageFs(string $imgPath): void
    {
        $this->image['fs_path'] = $imgPath;
    }

    /**
     * @return mixed
     */
    public function jsonSerialize(): mixed
    {
        return [
            'f_name' => $this->getFirstName(),
            'l_name' => $this->getLastName(),
            'city' => $this->getCity(),
            'lang' => $this->getLangs(),
            'info' => $this->getInfo(),
            'image' => $this->getImageUrl()
        ];
    }
}
