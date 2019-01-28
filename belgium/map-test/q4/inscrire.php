<html>
<script>
   
   function verif()
   {	 if (document.form1.email.value.indexOf("@",1)<0)
				{
				alert("ton Adresse mail saisie est invalide.\n" );
				document.form1.email.focus();
				return(false);
		}
		else
		 if (document.form1.email1.value.indexOf("@",1)<0)
				{
				alert("Adresse email 1 saisie invalide.\n" );
				document.form1.email1.focus();
				return(false);
		}
		else
		 if (document.form1.email2.value.indexOf("@",1)<0)
				{
				alert("Adresse email 2 saisie invalide.\n" );
				document.form1.email2.focus();
				return(false);
		}
		else
		 if (document.form1.email3.value.indexOf("@",1)<0)
				{
				alert("Adresse email 3 saisie invalide.\n" );
				document.form1.email3.focus();
				return(false);
		}
		else
       if ((document.form1.prenom.value=='')||(document.form1.nom.value=='')||(document.form1.age.value=='')
       ||(document.form1.login.value=='') ||(document.form1.motp1.value=='') ||(document.form1.motp2.value=='')
	   ||(document.form1.email.value=='')||(document.form1.email1.value=='')||(document.form1.email2.value=='')
	   ||(document.form1.email3.value==''))
       {
           alert("il faut remplir tout les champs");
           return(false);
       }
       else
       {
           if (document.form1.motp2.value != document.form1.motp1.value)
           {
               alert("les deux mots de passe sont defferent");
               return(false);
           }
		   else 
		   {    
			   if ( isNaN(document.form1.age.value)==true )
			   {
			       alert("l'age doit etre une valeur Numerique !!! ");
				   return false ;
			   }
		    }
       }
   }
</script>
<head><title>Inscrire</title>
<style type="text/css">
<!--
.Style1 {color: #000000}
-->
</style>
</head>
<body link="#FF0000" vlink="#FF0000" text="#FF0000" bgcolor="#000000" alink="#FF2227">
<center>
  <h1 class="Style1">*** S'INSCRIRE ***</h1>
  <hr></center>
<form Name="form1" action="inscription.php" method="post" onSubmit="return verif()">
<pre>Nom         	 : <input type="text" name=nom size=25></pre>
<pre>Prenom       	 : <input type="text" name=prenom size=25>

 age         	 : <input type="int" name=age size="5" >

 Login           :  <input name=login size=15>

password         :  <input type="password" name=motp1 size=15>

Confirmer	 : <input type="password" name=motp2 size=15>
password
</pre>
<pre>email		 : <input name=email size=15></pre>
<pre>entrer l'email de 3 amis:</pre>
<pre>email 1:  <input name=email1 size=15>  email 2:  <input  name=email2 size=15>  email 3:  <input  name=email3 size=15>
</pre>
<input type="submit" value="Valider"/></br></br>


</form>
<hr>
<h3 align="center"><a href="index.php" style="text-decoration: none">retour a la 
page d'acceuil </a>
</h3>
<hr>
<p align="center"></p>
</body>
</html>