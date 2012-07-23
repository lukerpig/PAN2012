var video;
function vidSize(vid){
	video = vid;
	var vidW = vid.offsetWidth;
	var vidH = vidW*9/16;
	vid.style.width=vidW+"px";
	vid.style.height=vidH+"px";
}

window.addEventListener('resize', function(){ if(video) vidSize(video) }, false);

