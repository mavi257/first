// photobos js
	jQuery('.enima_photo_gallery').photobox('.photobox_a');
	jQuery('.enima_photo_gallery').photobox('.photobox_a:first', { thumbs:false, time:0 }, imageLoaded);
	function imageLoaded(){
		console.log('image has been loaded...');
	}