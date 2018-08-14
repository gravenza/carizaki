function playvideo(n){
	var img = $('#myImg'+ n).data('url');
	var modalImg = $("#theContent");

			
	modalImg.attr('src',img +'?autoplay=1');
			
	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("btn-close")[0];

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() { 
		modalImg.attr('src',img +'?autoplay=0');
	}
}