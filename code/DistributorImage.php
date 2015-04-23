<?php

class DistributorImage extends Image
{

    function generateCroppedResize($gd, $width, $height)
    {
        return $gd->croppedResize($width, $height);
    }

    function generatePaddedResize($gd, $width, $height)
    {
        return $gd->paddedResize($width, $height);
    }

    function generateFittedResize($gd, $width, $height)
    {
        return $gd->fittedResize($width, $height);
    }

    function generateResize($gd, $width, $height)
    {
        return $gd->resize($width, $height);
    }

    function generateResizeByWidth($gd, $width)
    {
        return $gd->resizeByWidth($width);
    }

    function generateResizeByHeight($gd, $height)
    {
        return $gd->resizeByHeight($height);
    }

    function generateResizeRatio($gd, $width, $height)
    {
        return $gd->resizeRatio($width, $height);
    }

}
