<?php
//Declaro un array
$cars = array("Volvo", "BMW", "Toyota");
echo("Tengo un array con datos. Te lo muestro: ");
echo("<br>");

var_dump($cars);

echo("<br>");
echo("<br>");
echo("<br>");

echo("Puedo transformar ese array en un JSON con el método 'json_encode()'");

echo("<br>");

//Los transformo a un JSON.
$myJSON = json_encode($cars);   //<----------- acá está la magia, me devuelve un objeto string pero con formato JSON. Fijate como se ve en pantalla. Se ve como un array de JS

echo("Cuando transformo ese array con 'json_encode' los datos se ven así: ");
echo("<br>");
echo($myJSON);
echo("<br>");
echo("<br>");
echo("Es decir, se ven como un array javascript común y corriente: ");
echo("<br>");
echo("Ahora lo puedo guardar en un archivo .txt.");
//Creo un archivo .txt y escribo el contenido del JSON
$carsFile =  fopen("cars.txt", "w+");
fwrite($carsFile, $myJSON);

echo("<br>");
echo("<br>");
echo("Ok. De esta forma podes guardar una lista de autos, personas, (usuarios en tu caso) sin necesidad de almacenarlos en una base de datos.");
echo("<br>");
echo("Pero .. ¿ Para qué quiero guardar los datos en un .txt con formato JSON??");
echo("<br>");
echo("Por practicidad. Y para que sea más legible. Pero por sobretodo, por practicidad.");
echo("<br>");
echo("Cuando quieras recuperar los datos del archivo .txt, ya los tendrías en un formato fácil de decodificar.");
echo("<br>");
echo("<br>");

echo("Primero recupero los datos del archivo de texto.");
echo("<br>");
echo("Y simplemente uso el método 'json_decode'.");
echo("<br>");
echo("Transformando ese JSON en un hermoso array de PHP. Es decir:");
echo("<br>");

$streamToString = file_get_contents('cars.txt'); //<------ recupero los datos del archivo .txt
echo("<br>");


echo("Pasando de ésto");
echo("<br>");
echo($streamToString);
echo("<br>");


echo("A ésto de nuevo");
echo("<br>");
$streamToObject = json_decode($streamToString, true);  //<------  con éste método volves a convertir los datos almacenados en un .txt en un Array de php.
var_dump($streamToObject);

echo("<br>");
echo("<br>");
echo("Y listo. Ahora ya podés compara los datos de ese array con los datos que el usuario ingresó o pushear datos a ese array para 'dar' de alta nuevos usuarios, etc.");
?>