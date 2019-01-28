<p align="center"><strong>Quiz</strong></p>
		<p>Question1? </p>
		<form method="post" action="quiz.php">
		<p><input type="radio" name="q1" value="Reponse1">Reponse1 <input type="radio" name="q1" value="Reponse2">Reponse2  <input type="radio" name="q1" value="Reponse3">Reponse3</p>
		<?
		$question1 = ($_POST['q1']);
		if ($question1 == "Reponse3")//si c'est juste
		{
//afficher:
		echo '<p><style:"color:#00FF00;">Bonne réponse! T\'as fait au hasard non?</style></p>';
		}
		else//si c'est faux
		{
		echo '<p><style:"color:#FF0000;">Vas-y remplis-moi ce formulaire</style></p>';
		}
		?>
//etc...
//ensuite quand on a nos 10 questions sur ce modèle:
<?
//on les transforme en points
$question 1 = ($_POST['q1']);
if ($question1 == "Reponse3")
{
$question1 = 2;
}
else //sinon on met 0
{
$question1 = 0;
}
//on répète ça pour les 9 autres questions en remplaçant Reponse3 par la bonne réponse
//Puis on fait la moyenne:
$note = $question1+$question2+$question3+$question4+$question5+$question6+$question7+
$question8+$question9+$question10;
echo '<p>Tu as ' . $note . '/20</p>';
?>