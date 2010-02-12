<?=doctype('xhtml1-strict');?>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>

    <title><?=$title;?> | Teaspoon CRM</title>

    <?=link_tag('application/views/' . $this->config->item('theme') . '/assets/stylesheets/style.css'); ?>
    <?=link_tag('application/views/' . $this->config->item('theme') . '/assets/images/favicon.png', 'shortcut icon', 'image/x-icon');?>

    <script src="<?=site_url();?>application/views/<?=$this->config->item('theme');?>/assets/scripts/jquery-1.3.2.min.js" type="text/javascript"></script>
    <script src="<?=site_url();?>application/views/<?=$this->config->item('theme');?>/assets/scripts/jquery.autogrow.js" type="text/javascript"></script>
    <script src="<?=site_url();?>application/views/<?=$this->config->item('theme');?>/assets/scripts/jquery.tablesorter.js" type="text/javascript"></script>
    <script src="<?=site_url();?>application/views/<?=$this->config->item('theme');?>/assets/scripts/jquery.form.js" type="text/javascript"></script>
    <script src="<?=site_url();?>application/views/<?=$this->config->item('theme');?>/assets/scripts/teaspoon.js" type="text/javascript"></script>

  </head>

  <body>

    <!--[if lte IE 6]>
      <div id="ie6">
    <![endif]-->

    <!--[if IE 7]>
      <div id="ie7">
    <![endif]-->

    <div id="header">

      <h1 id="logo"><?=anchor('','Teaspoon CRM');?></h1>

      <?php if ($this->tank_auth->is_logged_in()):?>
        <ul class="topnav">
        	<li><?=anchor('contact','Contacts');?></li>
        	<li><?=anchor('auth/account','Account');?></li>
        	<li><?=anchor('auth/logout','Logout');?></li>
        </ul>
      <?php endif; ?>

    </div>

    <div id="container">
      <?php if ($this->session->flashdata('message')):?>
        <div id="message">
          <?php echo $this->session->flashdata('message');?>
          <span class="close">x</span>
        </div>
      <?php endif; ?>
