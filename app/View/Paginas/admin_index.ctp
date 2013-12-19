<?php echo $this->Html->link('Nova página',array('controller'=>'Paginas','action'=>'add'),array('class'=>'btn btn-info ttip','title'=>'Criar nova página')) ;?>
<hr />
<div class="pagina-controller">
	<?php echo $this->Session->flash(); ?>
	<table class="table-ajax table table-striped table-hover table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Titulo do menu</th>
				<th>Titulo da página</th>
				<th class="actions">Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$i=0;
			foreach($retorno as $value):
				$i++;
			?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $value['Pagina']['titulo'];?></td>
				<td><?php echo $value['Pagina']['title'];?></td>
				<td class="table-acoes">
					<div class="btn-group">
						<?php
						echo $this->Html->link(
							'<i class="icon-cogs"></i> Editar',
							array('controller'=>'Paginas','action'=>'edita',$value['Pagina']['id']),
							array('escape'=>false,'class'=>'btn ttip btn-success','title'=>'Editar '.$value['Pagina']['title'])
							);?>
						<?php
						echo $this->Html->link(
							'<i class="icon-sort-up"></i> Sobe',
							array('controller'=>'Paginas','action'=>'sobe',$value['Pagina']['id']),
							array('escape'=>false,'class'=>'btn ttip',
								'title'=>'Mover '.$value['Pagina']['title'].' para cima',
								)
								);?>
						<?php
						echo $this->Html->link(
							'<i class="icon-sort-down"></i> Desce',
							array('controller'=>'Paginas','action'=>'desce',$value['Pagina']['id']),
							array('escape'=>false,
								'class'=>'btn ttip','title'=>'Mover  '.$value['Pagina']['title'].' para baixo',
								)
								);?>
						<?php
						echo $this->Html->link(
							'<i class="icon-remove"></i> Remover',
							array('controller'=>'Paginas','action'=>'remove',$value['Pagina']['id']),
							array('escape'=>false,
								'class'=>'btn btn-danger ttip confirm',
								'title'=>'Apagar  '.$value['Pagina']['title'].' definitivamente!',
								)
								);?>
							</div>
						</td>
					</tr>
				<?php endforeach;?>
			</tbody>
			<tfoot>
				<tr>
					<th>#</th>
					<th>Titulo do menu</th>
					<th>Titulo da página</th>
					<th>Ações</th>
				</tr>
			</tfoot>
		</table>
	</div>
	<hr />
	<?php echo $this->Html->link('Nova página',array('controller'=>'Paginas','action'=>'add'),array('class'=>'btn btn-info ttip','title'=>'Criar nova página')) ;?>
