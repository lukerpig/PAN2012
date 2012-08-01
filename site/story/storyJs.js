function vidSize(vid){
	var vidW = vid.offsetWidth;
	var vidH = vidW*9/16;
	vid.style.height=vidH+"px";
}

	window.addEventListener('resize', function(){ vidSize(vid) }, false);
