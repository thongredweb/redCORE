<?php
/**
* @package     redCORE
* @subpackage  Cept
* @copyright   Copyright (C) 2008 - 2016 redCOMPONENT.com. All rights reserved.
* @license     GNU General Public License version 2 or later; see LICENSE.txt
*/

class InstallExtensionCest
{
	public function install(\AcceptanceTester $I)
	{
		$I->wantToTest('redCORE installation in Joomla 3');
		$I->doAdministratorLogin();
		$path = $I->getConfiguration('install packages url');
		$I->installExtensionFromUrl($path . 'redCORE.zip');
	}

	public function activateWebservices(\AcceptanceTester $I)
	{
		$I->wantToTest('Activate the default webservices available in redCORE');
		$I->doAdministratorLogin();
		$I->comment('I enable basic authentication');
		$I->amOnPage('administrator/index.php?option=com_redcore&view=config&layout=edit&component=com_redcore');
		$I->waitForText('redCORE Config', 30, ['css' => 'h1']);
		$I->click(['link' => 'Webservice options']);
		$I->waitForElementVisible(['id' => 'REDCORE_WEBSERVICES_OPTIONS']);
		$I->executeJS("javascript:document.getElementById(\"REDCORE_WEBSERVICES_OPTIONS\").scrollIntoView();");
		$I->selectOptionInRadioField('Enable webservices', 'Yes');
		$I->selectOptionInChosen('Check user permission against', 'Joomla - Use already defined authorization checks in Joomla');
		$I->selectOptionInRadioField('Enable SOAP Server', 'Yes');
		$I->executeJS('window.scrollTo(0,0)');
		$I->click(['xpath' => "//button[contains(@onclick, 'config.apply')]"]);
		$I->waitForText('Save success', 30, ['id' => 'system-message-container']);
		$I->amOnPage('administrator/index.php?option=com_redcore&view=webservices');
		$I->waitForText('Webservice Manager', 30, ['css' => 'H1']);
		$I->click(['class' => 'lc-not_installed_webservices']);
		$I->waitForElement(['class' => 'lc-install_all_webservices'], 60);
		$I->executeJS("javascript:window.scrollBy(0,200);");
		$I->click(['class' => 'lc-install_all_webservices']);
		$I->waitForElement(['id' => 'oauthClientsList'], 30);
		$I->see('administrator.contact.1.0.0.xml', ['class' => 'lc-webservice-file']);
		$I->see('site.contact.1.0.0.xml', ['class' => 'lc-webservice-file']);
		$I->see('site.users.1.0.0.xml', ['class' => 'lc-webservice-file']);
	}
}
