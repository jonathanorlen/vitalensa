<a href="#" id="scroll" style="display: none;"><span></span></a>
	<script type="text/javascript">
		
		$(document).ready(function(){ 
			$(window).scroll(function(){ 
				if ($(this).scrollTop() > 100) { 
					$('#scroll').fadeIn(); 
				} else { 
					$('#scroll').fadeOut(); 
				} 
			}); 
			$('#scroll').click(function(){ 
				$("html, body").animate({ scrollTop: 0 }, 600); 
				return false; 
			}); 
		});
	</script>
	<div style="margin-top:50px;margin-bottom:20px;width:100%;text-align:center;">
		<h5 style="font-family:SF Display Medium">Made by J.O.P </h5> <h6 style="font-family:SF Display Medium">@2018</h6>
	</div>
</body>
</html>