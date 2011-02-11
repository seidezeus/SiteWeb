function $(e)
{
	return document.getElementById(e);
}

function effacer(o, v)
{
	if(o.value == v)
		o.value = '';
}

function restaurer(o, v)
{
	if(o.value == '')
		o.value = v;
}

function envoyer(f)
{
	var form = $(f);
	form.submit();
}

sfHover = function() {
		var sfEls = document.getElementById("menu").getElementsByTagName("LI");
		for (var i=0; i<sfEls.length; i++) {
			sfEls[i].onmouseover=function() {
				this.className+="sfhover";
			}
			sfEls[i].onmouseout=function() {
				this.className=this.className.replace(new RegExp("sfhover\\b"), "");
			}
		}
		}
		if (window.attachEvent) window.attachEvent("onload", sfHover);
