<script  type="text/javascript">
        var table = $('#challenge-report').DataTable({
			columns: [
            { data: "check_user" }
        	],
			"language": {
				"zeroRecords": "",
				"infoEmpty": "No records available",
				"infoFiltered": "(filtered from _MAX_ total records)",
				"search" : "Buscar participante:",

			},
			"scrollY":        "400px",
			"scrollCollapse": true,
			"paging":         false,
			"lengthMenu": [[8, 16, 24, -1], [8, 16, 24, "All"]]
		});
		$('#btn-filter').click(function() {
			$('#users-check_filter').val('');
				table.search('').draw(); //required after
		});
		$("#selectAll").on("click", function() {  
			$(".check_users").prop("checked", this.checked);  
		});

</script><?php /**PATH C:\Users\dsgut\Desktop\SW\LaravelSixDotCero\resources\views/scripts/reports.blade.php ENDPATH**/ ?>