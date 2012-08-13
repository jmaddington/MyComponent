<?php
/**
 * bootstrap script file for MyComponent extra
 *
 * Copyright 2012 by Bob Ray <http://bobsguides.com>
 * Created on 08-11-2012
 *
 * MyComponent is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * MyComponent is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * MyComponent; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package mycomponent
 */

/**
 * Description
 * -----------
 * Bootstrap creates a new Transport Package build environment based on the
 * information in the project config file (config/myproject.config.php).
 * Bootstrap will create the necessary directories and files to build the
 * Transport Package, and any objects you need in the MODX install
 * (snippets, chunks, resources, etc.).
 *
 * Along with the other MyComponent Utilities (exportObjects, lexiconhelper,
 * checkproperties, etc.) most, if not all, of the files you will need
 * to create a Transport Package for your extra will be created for you.
 *
 * Always run bootstrap before doing any work at all on a project (after
 * creating and editing the project config file).
 *
 * Bootstrap is completely non-destructive. It will not overwrite any existing files
 * or objects. You can run it repeatedly during your project to add new components.
 *
 *
 * Variables
 * ---------
 * @var $modx modX
 * @var $scriptProperties array
 *
 * @package mycomponent
 **/


$props =& $scriptProperties;

/* @var $modx modX */
if (!defined('MODX_CORE_PATH')) {
    require_once dirname(dirname(__FILE__)) . '/build.config.php';
    require_once MODX_CORE_PATH . 'model/modx/modx.class.php';
    $modx= new modX();
    $modx->initialize('mgr');
    $modx->setLogLevel(modX::LOG_LEVEL_INFO);
    $modx->setLogTarget('ECHO');
} else {
    echo "\n<pre>\n"; /* used for nice formatting for log messages if run in a browser */
}

$scriptProperties = array();

$props =& $scriptProperties;
require_once MODX_ASSETS_PATH . 'mycomponents/mycomponent/_build/utilities/bootstrap.class.php';
$bootStrap = new Bootstrap($modx,$props);

$bootStrap->init();
$bootStrap->createBasics();
$bootStrap->createCategory();
$bootStrap->createElements();
$bootStrap->createResources();
$bootStrap->createAssetsDirs();
$bootStrap->createPluginResolver();
$bootStrap->createTvResolver();
$bootStrap->createValidators();
$bootStrap->createExtraResolvers();
$bootStrap->createInstallOptions();
$bootStrap->createPropertySets();
$bootStrap->createClassFiles();

$modx->log(MODX::LOG_LEVEL_INFO,'Finished!');

