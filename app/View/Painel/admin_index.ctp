<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<div class="hero-unit">
				<h1><?php echo $user['nome'];?>, o que você gostaria de fazer?</h1>
				<h3>Bem vindo, este é o painel de gerenciamento do conteúdo do seu site, para iniciar você pode usar o menu acima ou um dos atalhos abaixo.</h3>
				<p>Se tiver alguma dúvida você pode entrar em contato com o administrador do sistema, aproveite para pedir a ele para sempre manter este painel atualizado com a ultima versão do CMS disponível, isso garante mais segurança, correção de bugs, páginas mais amigáveis e até mesmo possíveis novos recursos para você.</p>
				<p><small>Att. Total Interativa.</small></p>
				<p class="text-center">
					<?php echo $this->Html->link(
						$this->Html->image('btn-paginas.png').'<br/>Gerenciar páginas',
						array('admin'=>true,'controller'=>'Paginas','action'=>'index'),
						array('class'=>'btn','escape'=>false));
						?>
						<?php echo $this->Html->link(
							$this->Html->image('btn-usuarios.png').'<br/>Gerenciar usuários',
							array('admin'=>true,'controller'=>'Usuarios','action'=>'index'),
							array('class'=>'btn','escape'=>false));
							?>
							<?php echo $this->Html->link(
								$this->Html->image('btn-configuracao.png').'<br/>Configurações do site',
								array('admin'=>true,'controller'=>'Configuracoes','action'=>'index'),
								array('class'=>'btn','escape'=>false));
								?>
							</p>
						</div>
					</div>
				</div>
			</div>
