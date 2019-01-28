<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<STYLE type=text/css> BODY {
	OVERFLOW-X: hidden
}
v\:* {
	BEHAVIOR: url(#default#VML)
}
</STYLE>
 
<title>quiz by dezz</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body, td, th {
	color: #FF0000;
}
body {
	background-color: #000000;
}
.Style4 {font-size: 24px; font-family: Verdana, Arial, Helvetica, sans-serif;}
-->
</style>
</head>
<body link="#FF0000" vlink="#FF0000" text="#FF0000" bgcolor="#000000" alink="#FF2227">
<p>
  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="975" height="413">
    <param name="movie" value="Untitled.swf">
    <param name="quality" value="high">
    <embed src="Untitled.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="975" height="413"></embed>
  </object>
</p>
<p align="center" class="Style4"> <a href="acceuil.php">ENTRER</a></p>
<script language="JavaScript">

/* This credit MUST stay intact for use */
/* Visit our site at http://www.star28.com/ for more code */

<!-- Begin
var no = 50;
var speed = 1;
var ns4up = (document.layers) ? 1 : 0;
var ie4up = (document.all) ? 1 : 0;
var s, x, y, sn, cs;
var a, r, cx, cy;
var i, doc_width = 800, doc_height = 600;
if (ns4up) {
doc_width = self.innerWidth;
doc_height = self.innerHeight;
}
else
if (ie4up) {
doc_width = document.body.clientWidth;
doc_height = document.body.clientHeight;
}
x = new Array();
y = new Array();
r = new Array();
cx = new Array();
cy = new Array();
s = 8;
for (i = 0; i < no; ++ i) {  
initRain();
if (ns4up) {
if (i == 0) {
document.write("<layer name=\"dot"+ i +"\" left=\"1\" ");
document.write("top=\"1\" visibility=\"show\"><font color=\"blue\">");
document.write(",</font></layer>");
}
else {
document.write("<layer name=\"dot"+ i +"\" left=\"1\" ");
document.write("top=\"1\" visibility=\"show\"><font color=\"blue\">");
document.write(",</font></layer>");
   }
}
else 
if (ie4up) {
if (i == 0) {
document.write("<div id=\"dot"+ i +"\" style=\"POSITION: ");
document.write("absolute; Z-INDEX: "+ i +"; VISIBILITY: ");
document.write("visible; TOP: 15px; LEFT: 15px;\"><font color=\"blue\">");
document.write(",</font></div>");
}
else {
document.write("<div id=\"dot"+ i +"\" style=\"POSITION: ");
document.write("absolute; Z-INDEX: "+ i +"; VISIBILITY: ");
document.write("visible; TOP: 15px; LEFT: 15px;\"><font color=\"blue\">");
document.write(",</font></div>");
      }
   }
}
function initRain() {
a = 6;
r[i] = 1;
sn = Math.sin(a);
cs = Math.cos(a);
cx[i] = Math.random() * doc_width + 1;
cy[i] = Math.random() * doc_height + 1;
x[i] = r[i] * sn + cx[i];
y[i] = cy[i];
}
function makeRain() {
r[i] = 1;
cx[i] = Math.random() * doc_width + 1;
cy[i] = 1;
x[i] = r[i] * sn + cx[i];
y[i] = r[i] * cs + cy[i];
}
function updateRain() {
r[i] += s;
x[i] = r[i] * sn + cx[i];
y[i] = r[i] * cs + cy[i];
}
function raindropNS() {
for (i = 0; i < no; ++ i) {
updateRain();
if ((x[i] <= 1) || (x[i] >= (doc_width - 20)) || (y[i] >= (doc_height - 20))) {
makeRain();
doc_width = self.innerWidth;
doc_height = self.innerHeight;
}
document.layers["dot"+i].top = y[i];
document.layers["dot"+i].left = x[i];
}
setTimeout("raindropNS()", speed);
}
function raindropIE() {
for (i = 0; i < no; ++ i) {
updateRain();
if ((x[i] <= 1) || (x[i] >= (doc_width - 20)) || (y[i] >= (doc_height - 20))) {
makeRain();
doc_width = document.body.clientWidth;
doc_height = document.body.clientHeight;
}
document.all["dot"+i].style.pixelTop = y[i];
document.all["dot"+i].style.pixelLeft = x[i];
}
setTimeout("raindropIE()", speed);
}
if (ns4up) {
raindropNS();
}
else
if (ie4up) {
raindropIE();
}
//  End -->
</script>

</body>
</html>