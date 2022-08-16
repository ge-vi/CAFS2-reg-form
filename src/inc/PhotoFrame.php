<?php

class PhotoFrame
{
    private ParticipantDTO $participant;

    public function __construct(ParticipantDTO $participant)
    {
        $this->participant = $participant;
    }

    public function generateProfilePhoto(): ParticipantDTO
    {
        $imgPath = $this->participant->getImage();

        $gdProfileImage = imagecreatefromjpeg($imgPath);

        if ($gdProfileImage) {
            $imageWidth = imagesx($gdProfileImage);
            $imageHeight = imagesy($gdProfileImage);

            $gdImageWrapper = imagecreate($imageWidth + 40, $imageHeight + 120);

            imagecolorallocate($gdImageWrapper, 192, 192, 192);

            $isMerged = imagecopymerge(
                $gdImageWrapper,
                $gdProfileImage,
                20,
                20,
                0,
                0,
                $imageWidth,
                $imageHeight,
                100
            );

            if (!$isMerged) {
                echo 'images not merged';
                die();
            }

            imagejpeg($gdImageWrapper, $imgPath);

            $this->participant->setImageFs($imgPath);

            imagedestroy($gdProfileImage);
            imagedestroy($gdImageWrapper);

            return $this->participant;
        }
        return $this->participant;
    }
}
