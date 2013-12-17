<div class="container">
<div class="row">
<div class="span12">
<?php
echo $this->Form->create('Usuario');
echo $this->Form->input('nome');
echo $this->Form->input('username',array('label'=>'Usuário'));
echo $this->Form->input('password',array('label'=>'Senha'));
echo $this->Form->input('confirma',array('label'=>'Confirmação de senha','type'=>'password'));
echo $this->Form->input('titulo',array('class'=>'input-block-level','type'=>'text','label'=>'Título do site'));
echo $this->Form->end('Criar administrador');
?>
</div>
</div>
</div>