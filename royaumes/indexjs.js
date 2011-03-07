var manager = new jsAnimManager(40);  

function imageAnim1() {
	var anim = manager.createAnimObject("anim1"); 
	anim.add({property: Prop.opacity, to: 0.7, duration: 400}); 
}
function imageAnim11() {
	var anim = manager.createAnimObject("anim1"); 
	anim.add({property: Prop.opacity, to: 0.2, duration: 400}); 
}

function imageAnim2() {
	var anim = manager.createAnimObject("anim2"); 
	anim.add({property: Prop.opacity, to: 0.7, duration: 400}); 
}
function imageAnim22() {
	var anim = manager.createAnimObject("anim2"); 
	anim.add({property: Prop.opacity, to: 0.2, duration: 400}); 
}

function imageAnim3() {
	var anim = manager.createAnimObject("anim3"); 
	anim.add({property: Prop.opacity, to: 0.7, duration: 400}); 
}
function imageAnim33() {
	var anim = manager.createAnimObject("anim3"); 
	anim.add({property: Prop.opacity, to: 0.2, duration: 400}); 
}
