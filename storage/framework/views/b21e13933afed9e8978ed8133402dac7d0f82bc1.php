<script type="text/javascript">

	function markNotificationAsRead()
	{
		$.get('/markAsRead');
	}
	var url = "/login";	
	var url2 = window.location.pathname;
	if (url != url2) {
		$('#nav-image').addClass("image-nav");
	}
</script>	
 
<?php /**PATH C:\Users\ca.gonzalezb1\Desktop\LaravelSixDotCero\resources\views/scripts/main-script.blade.php ENDPATH**/ ?>