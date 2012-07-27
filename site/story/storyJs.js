function vidSize(vid){
	var vidW = vid.offsetWidth;
	var vidH = vidW*9/16;
	vid.style.height=vidH+"px";
	console.log(vidW+" "+vidH+" "+vid.id)
	
	window.addEventListener('resize', function(){ if(vid) vidSize(vid) }, false);
}
