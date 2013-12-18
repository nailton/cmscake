<?php if($user){?>
<nav id="menu-principal" class="container-fluid">
	<ul class="nav nav-tabs">
		<li<?php if($active=='home') echo ' class="active"';?>><?php echo $this->Html->link('Home','/admin/');?></li>
		<li<?php if($active=='paginas') echo ' class="active"';?>><?php echo $this->Html->link('Páginas',array(
			'admin'=>true,
			'controller'=>'Paginas',
			'action'=>'index'
		));?></li>
        <li<?php if($active=='usuarios') echo ' class="active"';?>><?php echo $this->Html->link('Usuarios',array(
			'admin'=>true,
			'controller'=>'Usuarios',
			'action'=>'index'
		));?></li>
	</ul>
</nav>
<?php };?>
