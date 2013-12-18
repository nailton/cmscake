$(document).ready(function(){
	$('.table-ajax').dataTable();
	$('.ttip').tooltip();
	$('body').on('click','a.confirm',function(){
		if(confirm('Tem certeza que quer continuar?')){
			window.location.href=$(this).attr('href');
		}
		return false;
	});
});