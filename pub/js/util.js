function createRequest() {
  try {
    request = new XMLHttpRequest();
  } catch (tryMS) {
    try {
      request = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (otherMS) {
      try {
        request = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (failed) {
        request = null;
      }
    }
  }	
  return request;
}


function getActivatedObject(e) {
  var obj;
  if (!e) {
    // early version of IE
    obj = window.event.srcElement;
  } else if (e.srcElement) {
    // IE 7 or later
    obj = e.srcElement;
  } else {
    // DOM Level 2 browser
    obj = e.target;
  }
  return obj;
}

function addEventHandler(obj, eventName, handler) {
  if (document.attachEvent) {
    obj.attachEvent("on" + eventName, handler);
  } else if (document.addEventListener) {
    obj.addEventListener(eventName, handler, false);
  }
}

function getLength(str)
{
	var len = str.length;
	var retLen = 0;
	for(var i = 0; i < len ; ++i) {
		if(str.charCodeAt(i) < 27 || str.charCodeAt(i) > 126) {
			retLen += 2;
		}
		else {
			retLen ++;
		}		
	}		
	return retLen;
}

function checkValidPasswd(str)
{
	var reg = /^[x00-x7f]+$/;
	if (! reg.test(str)){
		return false;
	}
	return true;
}

//检查名字只能由中文，英文，数字和下划线组成
function checkValidName(str)
{
	return str.match(/^([\u4e00-\u9fa5]|[\ufe30-\uffa0]|[a-za-z0-9_])*$/);
}

function checkValidCaptcha(str)
{
	return str.match(/^([a-z0-9])*$/);
}


function replaceText(el, text)
{
	if(el != null)
	{
		clearText(el);
		var newNode = document.createTextNode(text);
		el.appendChild(newNode);
	}
}


function clearText(el)
{
	if(el != null)
	{
		if(el.childNodes)
		{
			for(var i = 0; i < el.childNodes.length; i++)
			{
				var childNode = el.childNodes[i];
				el.removeChild(childNode);
			}
		}
	}
}

function getText(el)
{
	var text = "";
	if(el != null) {
		if(el.childNodes) {
			for(var i = 0; i < el.childNodes.length; i++) {
				var childNode = el.childNode[i];
				if(childNode.nodeValue != null) {
					text = text + childNode.nodeValue;
				}
			}
		}
	}
	return text;
}

