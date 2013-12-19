<!DOCTYPE html>
<html>

<head>

	<title>CMS Tutorial – Teste CMS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php
	echo $this->Html->meta('icon');

	echo $this->Html->css(array('bootstrap.min','font-awesome','dataTables','admin'));

	echo $this->fetch('meta');
	echo $this->fetch('css');
	?>

</head>
<body>

	<header id="header">
		<div class="navbar navbar-fixed-top navbar-inverse">
			<div class="navbar-inner container-fluid">
			<?php echo $this->Html->link('CMS com Cake – Teste CMS','/admin',array('class'=>'brand'));?>
				<?php echo $this->element('admin/header');?>
			</div>
			<?php echo $this->element('admin/menu');?>
		</div>
	</header>

	<main>
		<article id="content" class="container-fluid">
<?php if($user) echo $this->Session->flash(); ?>
<?php echo $this->fetch('content'); ?>
		</article>
	</main>
	<footer id="footer" class="navbar">
<div class="navbar-inner container-fluid">

<?php echo $this->Html->link('CMS com Cake - ','http://totalinterativa.com.br',array('target' => '_blank', 'class'=>'brand text-center'));?>

</div>
	</footer>
	<?php echo $this->Html->script(array('jquery.min','bootstrap.min','dataTables','admin'));?>
	<?php echo $this->fetch('script'); ?>

</body>

</html>
