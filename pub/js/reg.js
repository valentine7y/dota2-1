
function initSignup1Event()
{
	document.getElementById("email").onclick = checkClick;
	document.getElementById("email").onblur = checkEmail;
	
	document.getElementById("passwd1").onclick = checkClick;
	document.getElementById("passwd1").onblur = checkPasswd;
	document.getElementById("passwd2").onclick = checkClick;
	document.getElementById("passwd2").onblur = checkPasswd;
	
	document.getElementById("username").onclick = checkClick;
	document.getElementById("username").onblur = checkUsername;

	document.getElementById("captcha").onclick = checkClick;
	document.getElementById("captcha").onblur = checkCaptcha;

	document.getElementById("regForm").onsubmit = verifyForm;

	document.getElementById("changeCaptcha").onclick = changeCaptcha;
}


function checkClick(e)
{
	var me = getActivatedObject(e);

	if(me.name == "email")
	{
		var email_desc = document.getElementById("email_desc");
		email_desc.innerHTML = "请填写本人真实邮箱";
		email_desc.className = "field-desc"; 
	}
	else if(me.name == "passwd1")
	{
		var passwd1_desc = document.getElementById("passwd1_desc");
		passwd1_desc.innerHTML = "输入6-20位密码, 密码可以是字母和数字";
		passwd1_desc.className = "field-desc";
	}
	else if(me.name == "passwd2")
	{
		var passwd2_desc = document.getElementById("passwd2_desc");
		passwd2_desc.innerHTML = "重新输入密码";
		passwd2_desc.className = "field-desc"; 
	}
	else if(me.name == "username")
	{
		var username_desc = document.getElementById("username_desc");
		username_desc.innerHTML = "用户昵称支持中英文,最多8位中文或者16位英文"
		username_desc.className = "field-desc";
	}
	else if(me.name == "captcha")
	{
		var username_desc = document.getElementById("captcha_desc");
		username_desc.innerHTML = "输入4位验证码";
		username_desc.className = "field-desc";
	}
}

function checkEmail(e)
{
	var email = document.getElementById("email");
	var email_desc = document.getElementById("email_desc");

	if(email.value.length == 0)
	{
		email_desc.innerHTML = "邮箱不能为空";
		email_desc.className = "field-desc-error";
	}
	else if(!/^[\w\.-_\+]+@[\w-]+(\.\w{2,4})+$/.test(email.value))
	{
		email_desc.innerHTML = "邮箱格式不正确";
		email_desc.className = "field-desc-error";
	}	
	else
	{
		email_desc.innerHTML = "";
		email_desc.className = "field-desc";

		//如果不是表单提交的话做ajax检查
		if(e != null)
		{
			var request = createRequest();
			if(request == null) return;

			var url = "checkemail.php?email=" + email.value;
			request.onreadystatechange = validateEmail;
			request.open("GET", url, true);
			request.send(null);
		}
		return true;
	}
	return false;
}

function validateEmail()
{
	if(request.readyState == 4)
	{
		if(request.status == 200)
		{
			if(request.responseText == "deny")
			{
				var email_desc = document.getElementById("email_desc");
				email_desc.innerHTML = "邮箱已经被使用";
				email_desc.className = "field-desc-error";
			}
			else if(request.responseText == "ok")
			{
			}
		}
	}
}


function checkPasswd()
{
	var passwd1 = document.getElementById("passwd1");
	var passwd1_desc = document.getElementById("passwd1_desc");
	var passwd2 = document.getElementById("passwd2");
	var passwd2_desc = document.getElementById("passwd2_desc");

	if(passwd1.value.length < 6)
	{
		passwd1_desc.innerHTML = "密码过短, 密码至少需要6位";
		passwd1_desc.className = "field-desc-error";
	}
	else if(passwd1.value.length > 20)
	{
		passwd1_desc.innerHTML = "密码过长，密码不能超过20位"; 
		passwd1_desc.className = "field-desc-error";
	}
	else if(!checkValidPasswd(passwd1.value))
	{
		passwd1_desc.innerHTML = "密码只能是字母,数字和符号";
		passwd1_desc.className = "field-desc-error";
	}
	else if(passwd2.value.length != 0 && passwd2.value != passwd1.value)
	{
			passwd2_desc.innerHTML = "密码不一致，请重新输入";
			passwd2_desc.className = "field-desc-error";
	}
	else
	{
		passwd1_desc.innerHTML = "";
		passwd1_desc.className = "field-desc";
		passwd2_desc.innerHTML = "";
		passwd2_desc.className = "field-desc";
		return true;
	}
	return false;
}


function checkUsername()
{
	var username = document.getElementById("username");
	var username_desc = document.getElementById("username_desc");

	var len = getLength(username.value);
	if(len > 16)
	{
		username_desc.innerHTML = "用户名过长, 最多8位中文或者16位英文";
		username_desc.className = "field-desc-error";	
	}
	else if(username.value.length == 0)
	{
		username_desc.innerHTML = "用户名不能为空";
		username_desc.className = "field-desc-error";	
	}	
	else if(!checkValidName(username.value))
	{
		username_desc.innerHTML = "用户名不合法，只能是英文，中文，数字和下划线";
		username_desc.className = "field-desc-error";	
		
	}
	else
	{
		username_desc.innerHTML = "";
		username_desc.className = "field-desc";	
		return true;
	}
	return false;
}

function checkCaptcha()
{
	var captcha = document.getElementById("captcha");
	var captcha_desc = document.getElementById("captcha_desc");

	if(captcha.value.length != 4)
	{
		captcha_desc.innerHTML = "请输入4位验证码";
		captcha_desc.className = "field-desc-error";
	}
	else if(!checkValidCaptcha(captcha.value))
	{
		captcha_desc.innerHTML = "验证码由小写字母和数字组成";
		captcha_desc.className = "field-desc-error";
	}
	else
	{
		captcha_desc.innerHTML = "";
		captcha_desc.className = "field-desc";
		return true;
	}
	return false;
}


function verifyForm()
{
	var flag = true;
	
	if(!checkEmail()) flag = false;
	if(!checkPasswd()) flag = false;
	if(!checkUsername()) flag = false;
	if(!checkCaptcha()) flag = false;

	return flag;
}

function changeCaptcha()
{
	var url = "./captcha.php?rand=" + Math.random();
	document.getElementById("captcha_img").src = url; 
}

function initSignup2Event()
{
	document.getElementById("province").onchange = checkProvinceCity;
}

function checkProvinceCity()
{
	request = createRequest();
	if(request == null) return;

	var province_id = document.getElementById("province").value;
	var url = "/user/loc.php?province=" + province_id;

	request.onreadystatechange = showCity; 
	request.open("GET", url, true);
	request.send(null);
}

function showCity()
{
	if(request.readyState == 4)
	{
		if(request.status == 200)
		{
			var city = eval('(' + request.responseText + ')');

			var province_city = document.getElementById("province_city");
			for(var i = province_city.childNodes.length; i>0; i--)
			{
				province_city.removeChild(province_city.childNodes[i-1]);
			}

			for(var key in city)
			{
				var option = document.createElement("option");
				var city_text = document.createTextNode(city[key]);

				option.setAttribute("value", key);
				option.appendChild(city_text);
				province_city.appendChild(option);
			}
		}
	}
}

