<?php
class Theme_Lightbox_Flickity_Component extends Kwc_List_Images_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['componentName'] = trlStatic('Bilder Galerie');
        $ret['componentCategory'] = 'special';
        $ret['generators']['child']['component'] = 'Kwc_Basic_Image_Component';

        $ret['generators']['model'] = array(
            'class' => 'Kwf_Component_Generator_Box_Static',
            'component' => 'Kwc_Basic_Empty_Component',
            'inherit' => true
        );
        return $ret;
    }

    public function getTemplateVars()
    {
        $ret = parent::getTemplateVars();

        //_getBemClass returns kwfUp- but we don't replace that correclty inside this json config, so so it now
        $cellClass = $this->_getBemClass('listItem'),
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
