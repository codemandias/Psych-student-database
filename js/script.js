var loadFile = function(event) {
	var image = document.getElementById('admissionProfile');
	image.src = URL.createObjectURL(event.target.files[0]);
};