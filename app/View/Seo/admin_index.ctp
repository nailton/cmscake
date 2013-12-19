<?php echo $this->Session->flash(); ?>
<?php
echo $this->Form->create('Seo',array('class'=>'form-horizontal'));
?>
<div class="row-fluid">
    <div class="span12">
    	<legend>Configurações do site</legend>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <h4>SEO (Otimização para motores de busca)</h4>
        <?php
        echo $this->Form->input('robots',array('label'=>'Robots.txt'));
        echo $this->Form->input('sitemap',array('label'=>'Sitemap.xml','after'=>'<span class="help-block">Deixe em branco para gerar automáticamente!</span>'));
        ?>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
    	<div class="btn-group">
            <?php
            echo $this->Form->button('Salvar',array('class'=>'btn btn-primary'));
            echo $this->Html->link(
                'Cancelar',
                array(
                    'action'=>'index'
                    ),
                array('class'=>'btn'));
                ?>
            </div>
        </div>
    </div>
    <?php
    echo $this->Form->end();
    ?>
