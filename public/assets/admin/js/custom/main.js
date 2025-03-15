
$(document).ready(function () {
    const Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: true,
		timer: 1000,
		
	});
});
function startLoading() {
   
    document.getElementById("loading").style.display = "block";
}
function endLoading() {
     
    document.getElementById("loading").style.display = "none";
}
