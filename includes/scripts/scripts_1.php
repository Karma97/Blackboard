	
<script type="text/javascript">
	if ($(".buttonscroll")) {
	$(".buttonscroll").hide();
	
	$(document).ready(function(){
		var mHeight = document.documentElement.clientHeight;
		$(window).scroll(function(){
			var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
			var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
			var scrolled = (winScroll / height) * 100;
			
			var element = $(".buttonscroll");
			
			if (scrolled >= <?php 
			
			if (isset($scroll_at)) {
				echo "".$scroll_at."";
			} else {
				echo "50";
			}
			
			?>) {
				$(element).fadeIn();		
			} else {
				$(element).fadeOut();		
			}
			
		});
	});
	}
</script>

<script type="text/javascript" src="js/script.js"></script>