<html>
<head>
  <title>Are you Human? CAPTCHA Image Form Valuator v1.0 EXAMPLE</title>
</head>
<body>
<center>

<FONT SIZE=5><B>Image Form Valuator v1.0</B> EXAMPLE</FONT>
<BR>
<P>Secure your Form with this free PHP script.</P>
<BR>






<? 

$imgcode = "";
include "src/config.php";
for ($i=0; $i<$symbols; $i++){
$imgcode .= code(mt_rand(0,24))."|";
}

if($code && !$imagetext){

    $error = 1;
    $errstr = "Please Enter the image code";
	
}elseif($code && $imagetext){


$chart = explode('|', $code);

for ($i=0; $i<5; $i++){
$chart[$i] = decode($chart[$i]);
$chek .= $letter[$chart[$i]];
}
if($chek != strtoupper($_POST['imagetext'])){
    $error = 1;
    $errstr = "You entered incorrect image code";
}elseif($chek == strtoupper($_POST['imagetext'])){
    $error = 1;
    $errstr = "You entered Correct image code. Thank you!";
}


}



if($error) print "<FONT SIZE=4 COLOR=BB0000>$errstr</FONT>";

print <<<FO
<P class=up_nave>Demo Script</P>
<form method="POST">
<table cellpadding="5" cellspacing="1" width="100%">
  <tr>
    <td align="left">Validation</td><input type="hidden" name="code" value="$imgcode">
    <td align="center"><img src="button.php?c=$imgcode" border=0> &nbsp; <input size=10 type="text" name="imagetext"></td>
  </tr>
  <tr>
    <td align="center" colspan="2">Enter the text above to validate your submission.<BR>
	<FONT SIZE=1>Reload this page if you can't read the above image</FONT>
	</td>
  </tr>
  <tr>
    <td align="center" colspan="2"><input type="submit" name="submit" value="Test Form"></td>
  </tr>
</table>
</form>
FO;

?>





</center>
</body>
</html>