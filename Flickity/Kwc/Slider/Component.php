<?php
class Flickity_Kwc_Slider_Component extends Kwc_Abstract_List_Component
{
    public static function getSettings($param = null)
    {
        $ret = parent::getSettings($param);
        $ret['componentName'] = trlStatic('Bilder Galerie');
        $ret['componentCategory'] = 'special';
        $ret['generators']['child']['component'] = 'Flickity_Kwc_Slider_Image_Component';
        return $ret;
    }

    public function getTemplateVars(Kwf_Component_Renderer_Abstract $renderer = null)
    {
        $ret = parent::getTemplateVars($renderer);

        //_getBemClass returns kwfUp- but we don't replace that correclty inside this json config, so so it now
        $cellClass = $this->_getBemClass('listItem');
        $up = Kwf_Config::getValue('application.uniquePrefix');
        if ($up) $up = $up.'-';
        $cellClass = str_replace('kwfUp-', $up, $cellClass);

        $ret['config'] = array(
            "cellAlign" => "center",
            "contain" => false,
            "wrapAround" => true,
            "cellSelector" => '.'.$cellClass,
            "lazyImages" => 2
        );
        return $ret;
    }
}
