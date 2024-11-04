<?php
$text = '<p>Detta är en <strong>viktig</strong> text med <script>alert("potentiellt skadlig kod"), Nackdelen med att tillåta vissa taggar är säkerhetsrisken. Genom att tillåta HTML-taggar öppnar man för potentiella säkerhetshål, särskilt om man tillåter taggar som kan innehålla skadlig kod.;</script>.</p>';
$allowed_tags = '<p><strong>';

$stripped = strip_tags($text, $allowed_tags);

echo $stripped;
// Output: <p>Detta är en <strong>viktig</strong> text med .</p>
echo "<p>For loop<p>";
for($i = 1.0; $i <= 5.0; $i += 0.1) {
    echo number_format($i, 1) . "\n";
}
echo "<p>while loop<p>";
$i = 1.0;
while($i <= 5) {
    echo number_format($i, 1) . "\n";
    $i += 0.1;   
}

$page["head"] = "<h1>Välkommen</h1>";
$page["main"] = "<p>Detta är innehållet på min sida</p>";
$page["footer"] = "<hr><p>Min sidfoot</p>";

foreach($page as $section => $content) {
    echo $content;
}

include ('../inc/math.php');
$summa = sum(2, 5);
$produkt = multiply(2, 5);
$differens = sub(5, 2);
$kvot = div(99, 11);


 echo "Summan av 2 och 5 är $summa<br>";
 echo "Produkten av 2 och 5 är $produkt<br>";
 echo "Differensen av 5 och 2 är $differens<br>";
 echo "kvoten mellan 99 och 11 är $kvot<br>";

?>

