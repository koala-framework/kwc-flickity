<?php
class Flickity_Assets_CommonJsProvider extends Kwf_Assets_Provider_Abstract
{
    public function getDependency($dependencyName)
    {
        if (substr($dependencyName, 0, 11) == 'kwcFlickity') {
            if (substr($dependencyName, -3) != '.js') {
                return new Kwf_Assets_Dependency_File_Js($this->_providerList, $dependencyName.'.js');
            }
        }

        return null;
    }
}
