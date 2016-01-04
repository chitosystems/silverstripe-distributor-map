<?php

class DistributorImage extends Image
{

    public function generateCroppedResize($gd, $width, $height)
    {
        return $gd->croppedResize($width, $height);
    }

    public function generatePaddedResize($gd, $width, $height)
    {
        return $gd->paddedResize($width, $height);
    }

    public function generateFittedResize($gd, $width, $height)
    {
        return $gd->fittedResize($width, $height);
    }

    public function generateResize($gd, $width, $height)
    {
        return $gd->resize($width, $height);
    }

    public function generateResizeByWidth($gd, $width)
    {
        return $gd->resizeByWidth($width);
    }

    public function generateResizeByHeight($gd, $height)
    {
        return $gd->resizeByHeight($height);
    }

    public function generateResizeRatio($gd, $width, $height)
    {
        return $gd->resizeRatio($width, $height);
    }
}
