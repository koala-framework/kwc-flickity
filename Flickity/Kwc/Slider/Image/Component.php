<?php
class Flickity_Kwc_Slider_Image_Component extends Kwc_Basic_Image_Component
{
    public static function getSettings($param = null)
    {
        $ret = parent::getSettings($param);
        $ret['maxWidthImageWidth'] = false;
        return $ret;
    }
}
