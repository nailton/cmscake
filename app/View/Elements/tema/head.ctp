<?php if(!isset($seo)):?>
	<title><?php echo $configs['titulo'];?></title>
	<?php echo $this->Html->meta('icon');?>
	<?php echo $this->fetch('meta');?>
<?php else:?>
	<title><?php echo $seo['title'].' > '.$configs['titulo'];?></title>
	<?php echo $this->Html->meta('icon');?>
	<?php if(!empty($seo['tags'])) :?><meta name="keywords" content="<?php echo $seo['tags'];?>" ><?php endif;?>
	<?php if(!empty($seo['descricao'])): ?><meta name="description" content="<?php echo $seo['descricao'];?>" ><?php endif;?>
	<?php
	endif;
	if($conteudo['slug']!='home')$this->Html->addCrumb($conteudo['titulo'],'/'.$conteudo['slug']);
	echo $this->fetch('css');
	?>
