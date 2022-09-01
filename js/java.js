function time() {
	time = setTimeout('show()', 1000);
}
function display() {
				var x = document.getElementById('animation');
				x.style.display ="block";
				x.style.top = "50px";
			}
function cancel() {
				var x = document.getElementById('animation');
				x.style.display ="none";
			}
	$(document).ready(function() {
							$("#click").click(function(){
								$("#reg").slideToggle("slow");
							})
							$("#clicks").click(function(){
								$("#reg").slideToggle("slow");
							})
							$(".small_screen_bar").click(function(){
								$(".left_side").slideToggle("slow").css("position", "absolute").css("z-index", "2").css("marginTop", "50px");
							})
							$(".big_screen_bar").click(function(){
								// $(".left_side").css("max-width", "0px");
								// $(".col-md-10").css("width", "100%");
							})
							$(".comment").click(function(){
								$(".comments").toggle("slow");
							})
							$("#category").click(function(){
								$(".cat").toggle("slow");
							})
							$(".posts").click(function(){
								$(".post").toggle("slow");
							})
							$(".page").click(function(){
								$(".pages").toggle("slow");
							})
							
						
    
				});

							$(document).ready(function() {
								$(".fa-bars").click(function(){
    						$(".slider").slideToggle('slow');
						})
							})
