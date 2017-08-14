<?

 +---------------------------------------------------------+
 | Image Form Valuator v1.0  Copyright www.YugDesign.com   |
 +---------------------------------------------------------+
 | This program may be used and hosted free of charge by   |
 |anyone for personal purpose as long as this copyright    |
 |notice and back link remain intact.                      |
 +---------------------------------------------------------+

//$c is a coded string with 5 letters to insert into image



include "src/config.php";


// make image from file
$image = ImageCreateFromGIF("$src/src.gif");



//make color palette
$color = array();
$color[0] = ImageColorAllocate($image, 150, 128, 128);
$color[1] = ImageColorAllocate($image, 250, 155, 155);
$color[2] = ImageColorAllocate($image, 155, 155, 155);
$color[3] = ImageColorAllocate($image, 155, 155, 250);
$color[4] = ImageColorAllocate($image, 250, 155, 250);

$st = 0;
$rs = $image_height/4;
$ls = $rs;
if($back_lines){
for ($i=0; $i<4; $i++){
imageLine($image, 0, mt_rand($st+2,$ls-2), $image_width, mt_rand($st+2,$ls-2), $color[mt_rand(0,4)]);
$st += $rs;
$ls += $rs;
}
}




if($c) $char = explode('|', $c);



$start = 0;
$end = $area;

for ($i=0; $i<$symbols; $i++){
$out[$i][id] = mt_rand(0,24);

$char[$i] = decode($char[$i]);

if($c) $out[$i][letter] = $letter[$char[$i]];
else $out[$i][letter] = $letter[$out[$i][id]];

$out[$i][font] = $src."/".$font[mt_rand(0,3)];
$out[$i][color] = $color[mt_rand(0,4)];
$out[$i][angle] = mt_rand(-15,15);

$out[$i][y] = mt_rand($font_size+5,($image_height-5));
$out[$i][x] = mt_rand($start+1,($end-$font_size-1));
$start += $area;
$end += $area;

imagettftext($image, $font_size, $out[$i][angle], $out[$i][x], $out[$i][y], $out[$i][color], $out[$i][font], $out[$i][letter]);
}


Header("Content-Type: image/Png");
imagePng($image);
ImageDestroy($image);
?>