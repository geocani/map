<HTML>
<head>
<LINK rel="stylesheet" type="text/css" href="graphismes.css">
</head>

<?
print("<BODY background=\"$fond\"><P ALIGN=\"CENTER\"><font color=\"$couleur\" size=\"5\"><br><br><br><br><br>");

if($score>=25)
{
print("BRAVO, VOUS AVEZ GAGNE $score points,<br><small><small>vous pouvez insrire votre nom dans la liste
des gagnants</small></small>");
}
if($score>=15 && $score<=24)
{
print("MOYEN: <small><small>vous avez obtenu $score"." points </small></small>");
}
if($score<=14)
{
print("LAISSE A DESIRER, <small><small>vous n'avez obtenu que $score points</small></small>");
}
print("
<br><br><small><small>
gagnants:<br>
<iframe src=\"gagnants/$quiz.txt\" weight=\"150\" height=\"100\"></iframe>
");
if($score>=25)
{
print("<br><a href=\"inscr.php?et=1&no=$quiz\">S'INSCRIRE DANS LA LISTE</a>");
}
if($score<=24)
{
print("<br>vous n'avez pas obtenu assez de points pour vous inscrire sur cette liste");
}
print("<br><br>
<a href=\"tests.php?cat=ind\">faire un autre test</a>");
?>
</body></html>