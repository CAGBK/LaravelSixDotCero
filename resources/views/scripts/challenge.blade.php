<script>
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

	
    $('#users-check').DataTable({

		
		"columns": [
            { "data": "check-user" }
        ],
		"language": {
            "zeroRecords": "Nothing found - sorry",
            "infoEmpty": "No records available",
			"infoFiltered": "(filtered from _MAX_ total records)",
			"search" : "Buscar Desafío",

		},
		"scrollY":        "400px",
        "scrollCollapse": true,
        "paging":         false,
        "lengthMenu": [[8, 16, 24, -1], [8, 16, 24, "All"]]
	});
	$('#brands-check').DataTable({
		"columns": [
            { "data": "check-user" }
        ],
		"language": {
            "zeroRecords": "Nothing found - sorry",
            "infoEmpty": "No records available",
			"search" : "Buscar",

        },
        "lengthMenu": [[8, 16, 24, -1], [8, 16, 24, "All"]]
	});
	$('#challenge-check').DataTable({
	});
	});
	$(function () {
    $('#datetime').datetimepicker({
        inline: true,
        sideBySide: true,
    });
});
</script>