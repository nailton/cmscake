<?php echo $this->Session->flash(); ?>
<?php
echo $this->Form->create('Pagina',array('class'=>'form-horizontal'));
?>
<legend>Criando página</legend>
<?php
echo $this->Form->input('titulo');
?>
<div class="alert alert-block alert-info">Após clicar em criar, escolha a opção <strong>Editar</strong> para inserir conteúdo na página!</div>
<div class="btn-group">
	<?php
	echo $this->Form->button('Criar',array('class'=>'btn btn-primary','data-step'=>'4'));
	echo $this->Html->link(
		'Cancelar',
		array(
			'action'=>'index'
			),
		array('class'=>'btn'));
		?>
	</div>
	<?php
	echo $this->Form->end();
