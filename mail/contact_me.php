<?php


$von = $_POST['von'];

  $email = $_POST['email'];

  $betreff = $_POST['betreff'];

  $nachricht = $_POST['nachricht'];

  $fertig = $_POST['fertig']; 



function checkEmail( $email )

  {

  $nonascii      = "x80-xff"; 

  $nqtext        = "[^\$nonascii1512"]";

  $qchar         = "\[^$nonascii]";

  $normuser      = '[a-zA-Z0-9][a-zA-Z0-9_.-]*';

  $quotedstring  = ""(?:$nqtext|$qchar)+"";

  $user_part     = "(?:$normuser|$quotedstring)";

  $dom_mainpart  = '[a-zA-Z0-9][a-zA-Z0-9._-]*.';

  $dom_subpart   = '(?:[a-zA-Z0-9][a-zA-Z0-9._-]*.)*';

  $dom_tldpart   = '[a-zA-Z]{2,5}';

  $domain_part   = "$dom_subpart$dom_mainpart$dom_tldpart";

  $pattern       = "$user_part@$domain_part";

  

  if (!preg_match( "/$pattern$/", $email ))

  {

  return FALSE;

  }

  else

  {

  return TRUE;

  }

  } 


if(isset($fertig)){


 if ($von == "") {

  echo"<script type="text/javascript"> alert("Sie haben ihren Namen nicht angegeben!");</script>";

  } elseif ($email == "") {

  echo"<script type="text/javascript"> alert("Sie haben ihre Email nicht angegeben!");</script>";

  } elseif ($betreff == "") {

  echo"<script type="text/javascript"> alert("Sie haben keinen Betreff angegeben!");</script>";

  } elseif ($nachricht == "") {

  echo"<script type="text/javascript"> alert("Sie haben keine Nachricht angegeben!");</script>"; 

  } elseif (!checkEmail( $_REQUEST['email'] )) {

  echo"<script type="text/javascript"> alert("Die Email Adresse ist nicht gueltig!");</script>";

  } else {

  

  



$datum = date("d.m.Y");

  $uhrzeit = date("H:i");

  $datum=$datum ."-". $uhrzeit ."Uhr";



 

  $ich = "blackhorsesraitersaich@yahoo.com";

  $betreffemail = "Kontaktformular";

  $text = "Nachricht von: ".$von."

  Seine e-Mail Adresse:  ".$email."

  Betreff:  ".$betreff."

  Sendedatum:  ".$datum."

  Nachticht:  ".$nachricht."

  

  

  

  ";

  mail($ich, $betreffemail, $text, 

  "From: Mustername <Absenderemail>");

  

  echo"<script type="text/javascript"> alert("Die Nachricht wurde erfolgreich verschickt!");</script>"; 


 


}

  }

  ?> 

