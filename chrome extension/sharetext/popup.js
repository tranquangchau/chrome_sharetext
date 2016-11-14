chrome.tabs.executeScript( {
  //code: "window.getSelection().toString();"
}, function(selection) {
    //alert(selection);
  //var query = encodeURIComponent(selection[0] || '汉典')
  document.querySelector('iframe').src =
  'http://php-chautran.rhcloud.com/sharetext';
  //'http://localhost/chrome/sharetext/';
});


// Copyright (c) 2011 The Chromium Authors. All rights reserved.
// Use of this source code is governed by a BSD-style license that can be
// found in the LICENSE file.

/**
 * Returns a handler which will open a new window when activated.
 */
function getClickHandler() {
  return function(info, tab) {

    // The srcUrl property is only available for image elements.
    var url = 'info.html#' + info.srcUrl;
	var link="http://localhost/chrome/savepic/?link="+info.srcUrl;
	loadXMLDoc(link);
	//console.log(url);
    // Create a new window to the info page.
    //chrome.windows.create({ url: url, width: 520, height: 660 });
  };
};
function loadXMLDoc(theURL)
{
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari, SeaMonkey
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			alert(xmlhttp.responseText);
		}
	}
	xmlhttp.open("GET", theURL, false);
	xmlhttp.send();
	//alert("sendok");
}
/**
 * Create a context menu which will only show up for images.
 */
chrome.contextMenus.create({
  "title" : "Get image info",
  "type" : "normal",
  "contexts" : ["image"],
  "onclick" : getClickHandler()
});
