<?php

/**
 * responsable for loading and maintaining Amfphp configuration
 *
 * @author Ariel Sommeria-klein
 */
class Amfphp_Core_Config {

    /**
     * paths to folders containing services(relative or absolute)
     * @var <array> of paths
     */
    public $serviceFolderPaths;

    /**
     * a dictionary of service classes represented in a ClassFindInfo.
     * The key is the name of the service, the value is the class find info.
     * for example: AmfphpDiscoveryService -> new ClassfindInfo( ... /plugins/serviceBrowser/AmfphpDiscoveryService.php, AmfphpDiscoveryService)
     * The forward slash is important, don't use '\'!     
     * @var <array> of ClassFindInfo
     */
    public $serviceNames2ClassFindInfo;

    /**
     * path to the folder containing the plugins. defaults to Amfphp_ROOTPATH . "/plugins/"
     * @var String
     */
    public $pluginsFolder;

    /**
     * array containing untyped plugin configuration data. Add as needed. The advised format is the name of the plugin as key, and then
     * paramName/paramValue pairs as an array.
     * example: array("plugin" => array( "paramName" =>"paramValue"))
     * The array( "paramName" =>"paramValue") will be passed as is to the plugin at construction time.
     * 
     * @var array
     */
    public $pluginsConfig;

    /**
     * array of plugins that are available but should be disabled
     * @var array
     */
    public $disabledPlugins;

    public function  __construct() {
        $this->serviceFolders = array();
        $this->serviceNames2ClassFindInfo = array();
        $this->pluginsFolder = Amfphp_ROOTPATH . "/plugins/";
        $this->pluginsConfig = array();
        $this->disabledPlugins = array();
        //disable logging by default
        $this->disabledPlugins[] = "AmfphpLogger";
        
    }
}
?>
