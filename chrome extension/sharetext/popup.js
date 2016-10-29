chrome.tabs.executeScript( {
  code: "window.getSelection().toString();"
}, function(selection) {
    //alert(selection);
  var query = encodeURIComponent(selection[0] || 'test')
  document.querySelector('iframe').src = 
    //'http://php-chautran.rhcloud.com/sharetext/'
    'http://localhost/chrome/sharetext/'
});
