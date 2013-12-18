<?php if($user){?>
<nav>
    <ul class="nav">
        <li>
            <?php echo $this->Html->link(
			'<b class="icon-user"></b> Editar seu perfil - Bem vindo '.$user['nome'],
			array('admin'=>true,'controller'=>'Usuarios','action'=>'add',$user['id']),
			array('escape'=>false));?></li>
        </li>
        <li>
            <?php echo $this->Html->link(
			'<b class="icon-arrow-left"></b> Ir para o site',
			'/',
			array('escape'=>false,'target'=>'_blank'));?></li>
        </li>
    </ul>
</nav>
<nav>
    <ul class="nav pull-right">
        <li>
		<?php echo $this->Html->link(
			'Sair <b class="icon-off"></b>',
			array('admin'=>true,'controller'=>'Usuarios','action'=>'logout'),
			array('escape'=>false));?></li>
    </ul>
</nav>
<?php };?>
