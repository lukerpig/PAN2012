var video=false;
function vidSize(vid){
	video = vid;
	var vidW = vid.offsetWidth;
	var vidH = vidW*9/16;
	vid.style.height=vidH+"px";
	console.log(vidW+" "+vidH)
}

window.addEventListener('resize', function(){ if(video) vidSize(video) }, false);

