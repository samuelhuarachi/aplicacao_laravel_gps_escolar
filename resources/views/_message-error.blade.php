@if ($errors->any())
	
	<script type="text/javascript">

	var erro;
	erro = '';

	// Rederiza mensagem de erro
	@foreach ($errors->all() as $error)
		erro = erro + '{{ $error }}\n';
	@endforeach


	swal({
		title: 'Erros!',
		text: erro,
		type: 'error',
		confirmButtonText: 'Voltar'
	});

	</script>

@endif