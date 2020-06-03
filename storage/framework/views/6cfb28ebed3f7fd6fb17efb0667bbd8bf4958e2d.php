<script  type="text/javascript">
	$(document).ready(function(){
		
		var current_fs, next_fs, previous_fs; //fieldsets
		var opacity;
		var current = 1;
		var steps = $("fieldset").length;

		setProgressBar(current);

		$(".next").click(function(){

		current_fs = $(this).parent();
		next_fs = $(this).parent().next();

		//Add Class Active
		$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

		//show the next fieldset
		next_fs.show();
		//hide the current fieldset with style
		current_fs.animate({opacity: 0}, {
		step: function(now) {
		// for making fielset appear animation
		opacity = 1 - now;

		current_fs.css({
		'display': 'none',
		'position': 'relative'
		});
		next_fs.css({'opacity': opacity});
		},
		duration: 500
		});
		setProgressBar(++current);
		});

		$(".previous").click(function(){

		current_fs = $(this).parent();
		previous_fs = $(this).parent().prev();

		//Remove class active
		$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

		//show the previous fieldset
		previous_fs.show();

		//hide the current fieldset with style
		current_fs.animate({opacity: 0}, {
		step: function(now) {
		// for making fielset appear animation
		opacity = 1 - now;

		current_fs.css({
		'display': 'none',
		'position': 'relative'
		});
		previous_fs.css({'opacity': opacity});
		},
		duration: 500
		});
		setProgressBar(--current);
		});

		function setProgressBar(curStep){
		var percent = parseFloat(100 / steps) * curStep;
		percent = percent.toFixed();
		$(".progress-bar")
		.css("width",percent+"%")
		}

		$(".submit").click(function(){
		return false;
		})

		var table = $('#users-check').DataTable({
			columns: [
            { data: "check_user" }
        	],
			"language": {
				"zeroRecords": "",
				"infoEmpty": "No records available",
				"infoFiltered": "(filtered from _MAX_ total records)",
				"search" : "Buscar Desafío",

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
		
	
		var tablebrand = $('#brands-check').DataTable({
				"columns": [
				{ "data": "brands-user" }
			],
			"language": {
				"zeroRecords": "No se ha encontrado nada, lo sentimos",
				"infoEmpty": "No records available",
				"search" : "Buscar Marcas",
			},
			"scrollY":        "200px",
				"scrollCollapse": true,
				"paging":         false,
				"lengthMenu": [[8, 16, 24, -1], [8, 16, 24, "All"]]
		});
			$('#btn-filter-brands').click(function() {
				$('#users-check_filter').val('');
					tablebrand.search('').draw(); //required after
			});


			var usersChecked = $('#usersCheck').DataTable(


			);
				var MinDate = Date.now();
				dateMin = moment(MinDate);
				$("#datetimepicker").datetimepicker({
					format: 'YYYY-MM-DD HH:mm:ss',
					minDate: dateMin,
				});
			
	});
</script><?php /**PATH /home3/desafiogru/LaravelSixDotCero/resources/views/scripts/challenge.blade.php ENDPATH**/ ?>