<html>
<script>
    function verif()
    {
         if ((document.form01.vlogin.value=='')||(document.form01.vmotp.value==''))
         {
             alert("il faut entrer un login et un mot de passe");
             return(false);
         }
    }
</script>
<head>
<style>
<!--
.styling{
background-color:black;
color:lime;
font: bold 15px MS Sans Serif;
padding: 3px;
}
-->
</style>
  
  
<title>Accueil</title>
<style type="text/css">
<!--
.Style2 {color: #004080}
.Style3 {color: #800000}
.Style4 {color: #000000}
-->
</style>
</head>
<body link="#FF0000" vlink="#FF0000" text="#FF0000" bgcolor="#000000" alink="#FF2227">
<div align="center" dir="ltr">
<span id="digitalclock" class="styling"></span>
<script>
/*****************************************
* LCD Clock script- by Javascriptkit
* Translated By www.sakrjava.netfirms.com/
* Visit our site at http://www.star28.com/ for more code
* This notice must stay intact for use
***********************************************/
<!--

var alternate=0
var standardbrowser=!document.all&&!document.getElementById

if (standardbrowser)
document.write('<form name="tick"><input type="text" name="tock" size="6"></form>')

function show(){
if (!standardbrowser)
var clockobj=document.getElementById? document.getElementById("digitalclock") : document.all.digitalclock
var Digital=new Date()
var hours=Digital.getHours()
var minutes=Digital.getMinutes()
var dn="AM"

if (hours==12) dn="PM" 
if (hours>12){
dn="PM"
hours=hours-12
}
if (hours==0) hours=12
if (hours.toString().length==1)
hours="0"+hours
if (minutes<=9)
minutes="0"+minutes

if (standardbrowser){
if (alternate==0)
document.tick.tock.value=hours+" : "+minutes+" "+dn
else
document.tick.tock.value=hours+"   "+minutes+" "+dn
}
else{
if (alternate==0)
clockobj.innerHTML=hours+"<font color='lime'>&nbsp;:&nbsp;</font>"+minutes+" "+"<sup style='font-size:1px'>"+dn+"</sup>"
else
clockobj.innerHTML=hours+"<font color='black'>&nbsp;:&nbsp;</font>"+minutes+" "+"<sup style='font-size:1px'>"+dn+"</sup>"
}
alternate=(alternate==0)? 1 : 0
setTimeout("show()",1000)
}
window.onload=show

//-->
</script></div>

<center class="Style3">
  <h1 class="Style4"><font color="#FF0000">
  <marquee width="379" behavior="alternate"> QUIZ EN LIGNE</marquee></font> *** </h1>
</center>
<center>
  <p align="left">&nbsp;<font size="4">
  Bienvenue sur notre site si vous voulez tester vos connaisance informatique essayer le
  </font><b> <a href="Quiz Rapide.php" class="Style2">
  <font size="4" color="#FF0000">Quiz D&eacute;butant </font> </a></b></p>
  <hr>
</center>
<h3>

</h3>

<form Name="form01" action="connexion.php" method="post" onSubmit="return verif()">

<pre> <font size="4">pour acceder aux quiz avances veuiller s'authentifier</font></pre>

<pre><font size="4">Si vous etes deja membre:</font></pre>

<pre><font size="4"> <b>Login</b>        : <input name="vlogin" size=15>

 <b>Mot de passe</b> : <input type="password" name="vmotp" size=15>
</font></pre>
<h3 align="left">

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<input type="submit" value="Connexion"/>
</h3>
<hr>
<p align="left"><font size="5">Si non vous pouver rapidement s'inscrire,c'est simple</font></p>
</form>


<blockquote>
  <blockquote>
    <p align="left">
<form  action="inscrire.php">
<font size="4">
<input type="submit" value="s'inscrire" style="float: left"/></font></p>
  </blockquote>
</blockquote>
</form>
<p>&nbsp;
</p>
<p>
<a href="file:///C|/Programmi/EasyPHP1-8/www/index.php">index</a><br>
</p>
<hr>
<p align="center">
<u><img src="mail22.gif" width="75" height="29"><a href="file:///C:/Programmi/EasyPHP1-8/www/auteur.htm"> </a><a href="auteur.htm">a propos de l'auteurs</a></u></p>
</body>
</html>