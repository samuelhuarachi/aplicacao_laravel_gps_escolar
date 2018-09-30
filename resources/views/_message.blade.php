@if(Session::has('flash_message'))
	<script type="text/javascript">
		swal({
			title: 'Pronto!',
			text: "{{ Session::get('flash_message') }}\n",
			type: 'success',
			confirmButtonText: 'OK'
		});

	</script>
@endif