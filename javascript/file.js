function getCookie(name) {
  const value = `; ${document.cookie}`;
  const parts = value.split(`; ${name}=`);
  if (parts.length === 2) return parts.pop().split(';').shift();
}
function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function printtypes(ff){
	var d= ff.innerHTML;
	var data = document.getElementById('spn');

    setCookie('type',d,'Thu, 01 Jan 2121 00:00:00 UTC');
    data.innerHTML = "Connectez-vous au compte "+d;
}