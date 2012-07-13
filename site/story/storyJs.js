var video;
function vidSize(vid){
	video = vid;
	var vidW = vid.offsetWidth;
	var vidH = vid.offsetWidth*9/16;
	vid.style.height=vidH+"px";
}

window.addEventListener('resize', function(){ vidSize(video) }, false);

