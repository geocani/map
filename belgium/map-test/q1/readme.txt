Systeme complet de quizz en ligne, y compris la création.---------------------------------------------------------
Url     : http://codes-sources.commentcamarche.net/source/30718-systeme-complet-de-quizz-en-ligne-y-compris-la-creationAuteur  : aze555666Date    : 05/08/2013
Licence :
=========

Ce document intitulé « Systeme complet de quizz en ligne, y compris la création. » issu de CommentCaMarche
(codes-sources.commentcamarche.net) est mis à disposition sous les termes de
la licence Creative Commons. Vous pouvez copier, modifier des copies de cette
source, dans les conditions fixées par la licence, tant que cette note
apparaît clairement.

Description :
=============

Voil&agrave; la derniere version de mon interface compl&ecirc;te de quizz. Elle 
est (incomparablement) mieux que la pr&eacute;c&eacute;dente.
<br />Elle foncti
onne avec une base de donn&eacute;es, et permet de proposer des quizz class&eacu
te;s en cat&eacute;gorie.
<br />Les fonctionnalit&eacute;es des quizz:
<br />-
10 question, les r&eacute;ponses ne peuvent pas &ecirc;tre vues par l'internaute
.
<br />-au bout de 3 essais infructueux, on passe &agrave; la question suivant
e.
<br />-3 points pour une bonne r&eacute;ponse du 1er coupr, 2 pour une r&eac
ute;ponse du 2eme courp, 1 pour une r&eacute;ponse au 3eme coup,0 en cas d'&eacu
te;chec.
<br />-message changeant en fonction du nombre de points obtenus sur 3
0.
<br />-liste des gagnants dans laquelle on peut s'inscrire &agrave; partir d
e 25 points obtenus (maximum 1 question rat&eacute;e)
<br />-les quizz on un ni
veau de difficult&eacute; compris entre 1 et 5
<br />Chaque quiz peut avoir une
 texture de fond et une couleur de police diff&eacute;rente.
<br />
<br />Cett
e source comprend une interface vous permettant de cr&eacute;er vos quizz rapide
ment. Cette interface peut &ecirc;tre mise en ligne
<br />pour que les internau
tes puissent cr&eacute;er leurs propres quizz.
<br />Vous disposez de la page l
iste.php, pour voir tous les quizz pr&eacute;sents sur le site, et leur contenu.

<br /><a name='source-exemple'></a><h2> Source / Exemple : </h2>
<br /><pre 
class='code' data-mode='basic'>
Voir le zip, en effet, c'est un peu long pour ê
tre mis ici. :-)

Attention:
-le script fonctionne avec mysql.
-pour la vers
ion sans mysql, (qui comporte moins de fonctionnalitées, et ne permet pas la cré
ation de quizz par les internautes), reportez vous à mon autre source: <a href='
http://www.phpcs.com/code.aspx?id=24215' target='_blank'>http://www.phpcs.com/co
de.aspx?id=24215</a> .
-le script de création permet à l'utilisateur de mettre 
une texture en fond des pages de son quizz, dont il indique l'url. il y a un lie
n vers ma collection de textures, qui permet d'en choisir une parmis des millier
s, mais le code de choix de ces textures n'est pas fourni ici. vous pouvez laiss
er le lien vers mes textures, je n'ai pas vraiment besoin de la bende passante d
u compte sur lequel je les aie mises.
</pre>
<br /><a name='conclusion'></a><h
2> Conclusion : </h2>
<br />INSTALLATION:
<br />-placez la totalit&eacute; de
s fichiers dans un dossier de votre site,
<br />-et modifiez les parametres de 
mysql et de cat&eacute;goriesdans variables.php
<br />-ex&eacute;cutez le fichi
er install.sql, pour cr&eacute;er les tabes initiales necessaires.
<br />
<br 
/>pour cr&eacute;er des nouveaux quizz, utilisez l'interface fournie! sinon, rep
ortez vous au fichier lisez-moi.txt.
<br />
<br />Attention: svp, n'utilisez p
as cette source pour me faire de la concurence, donc pas pour des sites dur le s
eigneur des anneaux, ou Tolkien en g&eacute;n&eacute;ral.
<br />
<br />n'oubli
ez pas de lire lisez-moi, il y a pas mal d'infos imporatantes.
<br />
<br />ps
, pour les webmasters: il est vrai que j'ai d&eacute;ja post&eacute; une source 
de quizz l'an dernier, mais celle ci n'est pas du tout la m&ecirc;me, si vous vo
ulez en supprimer une, supprimz plutot l'ancienne.
