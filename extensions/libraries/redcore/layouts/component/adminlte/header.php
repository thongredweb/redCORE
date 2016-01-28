<?php
/**
 * @package     Aesir.Backend
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2008 - 2015 redCOMPONENT.com. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die;

$logoUrl = JUri::root() . '/media/com_reditem/images/aesir_logo.png';
?>
<!-- Logo -->
<a href="<?php echo JRoute::_('index.php?option=com_reditem'); ?>" class="logo">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini">
	  <img src="<?php echo $logoUrl ?>" class="img-responsive">
  </span>
  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg">
	  <img src="<?php echo $logoUrl ?>" class="img-responsive center-block">
  </span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
	<!-- Sidebar toggle button-->
	<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
		<span class="sr-only">Toggle navigation</span>
	</a>
	<div class="navbar-custom-menu">
		<?php echo RLayoutHelper::render('component.adminlte.header.menu', $displayData); ?>
	</div>
</nav>
