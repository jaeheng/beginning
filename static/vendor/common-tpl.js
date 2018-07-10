function focusEle(ele){
	$('#' + ele).focus();
}
function updateEle(ele,content){
	$('#' + ele).html(content);
}
function timestamp(){
	return new Date().getTime();
}
function sendinfo(url,node){
	updateEle(node,"<div><span style=\"background-color:#FFFFE5; color:#666666;\">加载中...</span></div>");
	$.ajax({
		method: 'GET',
		url: url,
		data: '',
		success: function (resp) {
			updateEle(node, resp);
		}
	});
}
function loadTwitterReply(url,tid){
	url = url+"&stamp=" + timestamp();
	var r = $("#r_" + tid);
	var rp = $("#rp_" + tid);
	if (!r.is(':hidden')){
		r.fadeOut();
		rp.fadeOut();
	} else {
		r.show();
		r.html('<span style=\"background-color:#FFFFE5;text-align:center;font-size:12px;color:#666666;\">加载中...</span>');
		$.ajax({
			method: 'GET',
			url: url,
			data: '',
			success: function (resp) {
				r.html(resp);
				rp.fadeIn();
			}
		});
	}
}
function reply(url,tid){
	var rtext=document.getElementById("rtext_"+tid).value;
	var rname=document.getElementById("rname_"+tid).value;
	var rcode=document.getElementById("rcode_"+tid).value;
	var rmsg=document.getElementById("rmsg_"+tid);
	var rn=document.getElementById("rn_"+tid);
	var r=document.getElementById("r_"+tid);
	var data = "r="+rtext+"&rname="+rname+"&rcode="+rcode+"&tid="+tid;
	XMLHttp.sendReq('POST',url,data,function(obj){
		if(obj.responseText == 'err1'){rmsg.innerHTML = '(回复长度需在140个字内)';
		}else if(obj.responseText == 'err2'){rmsg.innerHTML = '(昵称不能为空)';
		}else if(obj.responseText == 'err3'){rmsg.innerHTML = '(验证码错误)';
		}else if(obj.responseText == 'err4'){rmsg.innerHTML = '(不允许使用该昵称)';
		}else if(obj.responseText == 'err5'){rmsg.innerHTML = '(已存在该回复)';
		}else if(obj.responseText == 'err0'){rmsg.innerHTML = '(禁止回复)';
		}else if(obj.responseText == 'succ1'){rmsg.innerHTML = '(回复成功，等待管理员审核)';
		}else{r.innerHTML += obj.responseText;rn.innerHTML = Number(rn.innerHTML)+1;rmsg.innerHTML=''}});
}
function re(tid, rp){
	var rtext=document.getElementById("rtext_"+tid).value = rp;
	focusEle("rtext_"+tid);
}
function commentReply(pid,c){
	var response = document.getElementById('comment-post');
	document.getElementById('comment-pid').value = pid;
	document.getElementById('cancel-reply').style.display = '';
	c.parentNode.parentNode.appendChild(response);
}
function cancelReply(){
	var commentPlace = document.getElementById('comment-place'),response = document.getElementById('comment-post');
	document.getElementById('comment-pid').value = 0;
	document.getElementById('cancel-reply').style.display = 'none';
	commentPlace.appendChild(response);
}