<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "spanishquestions";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$questions = array(
  array("¿Cuál es el pasado del verbo 'comer' para 'él'?", "b", array("a) comías", "b) comió", "c) comíamos")),
  array("¿Qué significa la frase 'tener hambre' en inglés?", "a", array("a) to have hunger", "b) to have thirst", "c) to have fear")),
  array("¿Cuál de las siguientes palabras es un adverbio de tiempo?", "b", array("a) rápido", "b) ahora", "c) grande")),
  array("¿Qué tiempo verbal se usa para expresar acciones futuras en español?", "c", array("a) presente", "b) pasado", "c) futuro")),
  array("¿Cuál es el plural de 'el lápiz'?", "b", array("a) las lápiz", "b) los lápices", "c) el lápices")),
  array("¿Cuál es el plato típico de México que consiste en carne marinada y cocida lentamente?", "c", array("a) paella", "b) enchiladas", "c) barbacoa")),
  array("¿Quién es el famoso pintor español conocido por su obra 'Guernica'?", "a", array("a) Pablo Picasso", "b) Salvador Dalí", "c) Diego Rivera")),
  array("¿Cuál es el nombre del festival español conocido por sus desfiles de carrozas y trajes tradicionales?", "c", array("a) Carnaval", "b) La Tomatina", "c) Feria de Abril")),
  array("¿Qué es un 'pueblo blanco' en España?", "c", array("a) Una playa famosa", "b) Un pueblo donde vive mucha gente", "c) Un pueblo con casas blancas y calles estrechas")),
  array("¿Cuál es el deporte nacional de España?", "a", array("a) Fútbol", "b) Tenis", "c) Baloncesto"))
);


foreach ($questions as $question) {
  $sql = "INSERT INTO questions (Question, `Correct Answer`, `Incorrect Answer 1`, `Incorrect Answer 2`, `Incorrect Answer 3`)
  VALUES ('" . addslashes($question[0]) . "', '" . $question[1] . "', '" . addslashes($question[2][0]) . "', '" . addslashes($question[2][1]) . "', '" . addslashes($question[2][2]) . "')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
