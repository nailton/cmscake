<!doctype html>
<html lang="en">
<head>
	<?php echo $this->Html->css('bootstrap.min',null,array('inline'=>false));?>
	<?php echo $this->element('tema/head'); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
</head>
<body <?php echo $this->element('tema/bodyclass'); ?>>
	<header id="header">
		<section id="logo"><?php echo $this->element('tema/logotipo'); ?></section>
		<nav><?php echo $this->element('tema/menu'); ?></nav>
	</header>
	<main>
		<section id="breadcrumbs"><?php echo $this->element('tema/breadcrumb'); ?></section>
		<article id="conteudo"><?php echo $this->element('tema/conteudo'); ?></article>
	</main>
	<script src="http://code.jquery.com/jquery.js"></script>
</body>
</html>
