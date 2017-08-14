<?

// configurate variables
$image_width = 100;
$image_height = 30;
$font_size = 14;
$symbols = 5;
$area = $image_width/$symbols;
$back_lines = 0; // set to 1 to show lines grid
$src = "src"; // path to fonts and image

// define font array here
$font = array("granit.ttf","elephant.ttf","cooper.ttf","penta.ttf");




$letter = array("P","S","D","W","O","U","K","H","Q","E","B","A","J","L","G","F","M","V","C","X","N","Y","I","R","T");

function code($in){
return strtr($in*5465872319, "1234567890", "HrYlKsMpXw");
}

function decode($in){
return (strtr($in, "HrYlKsMpXw", "1234567890")/5465872319);
}

?>