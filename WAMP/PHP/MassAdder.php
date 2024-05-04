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
    array("¿Cuál es tu canción favorita?", "Mi canción favorita es 'Despacito'", array("Mi canción favorita es 'Despacito'", "Mi canción favorita es 'Shape of You'", "Mi canción favorita es 'Uptown Funk'", "Mi canción favorita es 'Bohemian Rhapsody'")),
    array("¿Cuál es tu materia preferida?", "Mi materia preferida es la literatura", array("Mi materia preferida es la literatura", "Mi materia preferida es la matemática", "Mi materia preferida es la historia", "Mi materia preferida es la física")),
    array("¿Qué te gusta hacer en verano?", "Me gusta ir a la playa", array("Me gusta ir a la playa", "Me gusta esquiar en la montaña", "Me gusta visitar museos", "Me gusta quedarme en casa")),
    array("¿Cuál es tu lugar favorito en el mundo?", "Mi lugar favorito es París", array("Mi lugar favorito es París", "Mi lugar favorito es Nueva York", "Mi lugar favorito es Roma", "Mi lugar favorito es Tokio")),
    array("¿Cómo se dice 'hello' en español?", "a) Hola", array("a) Hola", "b) Adiós", "c) Gracias", "d) Por favor")),
    array("¿Cómo se dice 'goodbye' en español?", "b) Adiós", array("a) Hola", "b) Adiós", "c) Gracias", "d) Por favor")),
    array("¿Cómo se dice 'thank you' en español?", "c) Gracias", array("a) Hola", "b) Adiós", "c) Gracias", "d) Por favor")),
    array("¿Cómo se dice 'please' en español?", "d) Por favor", array("a) Hola", "b) Adiós", "c) Gracias", "d) Por favor")),
    array("¿Cuál es la capital de España?", "a) Madrid", array("a) Madrid", "b) Barcelona", "c) Sevilla", "d) Valencia")),
    array("¿Cuál es la capital de México?", "a) Ciudad de México", array("a) Ciudad de México", "b) Monterrey", "c) Guadalajara", "d) Puebla")),
    array("¿Qué día es el Día de la Independencia de México?", "b) 16 de septiembre", array("a) 5 de mayo", "b) 16 de septiembre", "c) 20 de noviembre", "d) 12 de octubre")),
    array("¿Qué día es el Día de la Independencia de Estados Unidos?", "a) 4 de julio", array("a) 4 de julio", "b) 1 de enero", "c) 14 de febrero", "d) 25 de diciembre")),
    array("¿Qué país tiene forma de bota?", "a) Italia", array("a) Italia", "b) Alemania", "c) Francia", "d) Reino Unido")),
    array("¿Qué país es conocido por la Gran Muralla?", "a) China", array("a) China", "b) India", "c) Japón", "d) Rusia")),
    array("¿Cuál es el río más largo del mundo?", "a) Nilo", array("a) Nilo", "b) Amazonas", "c) Yangtsé", "d) Mississippi")),
    array("¿Qué continente es conocido como el 'viejo continente'?", "a) Europa", array("a) Europa", "b) América", "c) África", "d) Asia")),
    array("¿Qué océano está al este de Estados Unidos?", "a) Atlántico", array("a) Atlántico", "b) Pacífico", "c) Índico", "d) Antártico")),
    array("¿Qué océano está al oeste de América?", "a) Pacífico", array("a) Pacífico", "b) Atlántico", "c) Índico", "d) Antártico")),
    array("¿Quién escribió 'Don Quijote de la Mancha'?", "a) Miguel de Cervantes", array("a) Miguel de Cervantes", "b) Gabriel García Márquez", "c) Jorge Luis Borges", "d) Pablo Neruda")),
    array("¿En qué país se encuentra la Torre Eiffel?", "a) Francia", array("a) Francia", "b) Italia", "c) España", "d) Reino Unido")),
    array("¿Qué idioma se habla en Brasil?", "a) Portugués", array("a) Portugués", "b) Español", "c) Inglés", "d) Francés")),
    array("¿Qué moneda se utiliza en Japón?", "a) Yen", array("a) Yen", "b) Dólar", "c) Euro", "d) Libra esterlina")),
    array("¿Cuál es el edificio más alto del mundo?", "a) Burj Khalifa", array("a) Burj Khalifa", "b) Torre Eiffel", "c) Empire State Building", "d) Torre de Shanghai")),
    array("¿Quién pintó la Mona Lisa?", "a) Leonardo da Vinci", array("a) Leonardo da Vinci", "b) Pablo Picasso", "c) Vincent van Gogh", "d) Michelangelo")),
    array("¿En qué país se encuentra el Taj Mahal?", "a) India", array("a) India", "b) Egipto", "c) China", "d) Turquía")),
    array("¿Qué montaña se encuentra en el límite entre Italia y Suiza?", "c) Matterhorn", array("a) Mont Blanc", "b) Monte Everest", "c) Matterhorn", "d) Kilimanjaro")),
    array("¿Quién fue el primer presidente de Estados Unidos?", "a) George Washington", array("a) George Washington", "b) Abraham Lincoln", "c) Thomas Jefferson", "d) John Adams")),
    array("¿Quién escribió 'Romeo y Julieta'?", "a) William Shakespeare", array("a) William Shakespeare", "b) Charles Dickens", "c) Jane Austen", "d) Mark Twain")),
    array("¿Qué es la Estatua de la Libertad?", "d) Todas las anteriores", array("a) Un monumento", "b) Un regalo de Francia a Estados Unidos", "c) Un símbolo de libertad", "d) Todas las anteriores")),
    array("¿Qué instrumento toca una persona que toca el violín?", "a) Violín", array("a) Violín", "b) Piano", "c) Flauta", "d) Trompeta")),
    array("¿Cuál es el elemento químico más abundante en la Tierra?", "b) Oxígeno", array("a) Hierro", "b) Oxígeno", "c) Carbono", "d) Hidrógeno")),
    array("¿Cuál es el planeta más grande del sistema solar?", "a) Júpiter", array("a) Júpiter", "b) Saturno", "c) Neptuno", "d) Urano")),
    array("¿Quién fue el primer hombre en la Luna?", "a) Neil Armstrong", array("a) Neil Armstrong", "b) Buzz Aldrin", "c) Yuri Gagarin", "d) Alan Shepard")),
  );


  foreach ($questions as $question) 
  {
    // Initialize an array to hold the escaped incorrect answers
    $escapedIncorrectAnswers = array();

    // Escape each incorrect answer and add it to the array
    foreach ($question[2] as $incorrectAnswer) 
    {
        if (!is_string($incorrectAnswer)) 
        {
            echo "Invalid incorrect answer: ";
            var_dump($incorrectAnswer);
        }
        $escapedIncorrectAnswers[] = addslashes($incorrectAnswer);
    }

    // Prepare the SQL statement
    $sql = "INSERT INTO questions (Question, `Correct Answer`, `Incorrect Answer 1`, `Incorrect Answer 2`, `Incorrect Answer 3`)
            VALUES (?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("sssss", $question[0], $question[1], $escapedIncorrectAnswers[0], $escapedIncorrectAnswers[1], $escapedIncorrectAnswers[2]);

    // Execute the statement
    if ($stmt->execute()) 
    {
        echo "New record created successfully";
    } else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}



    // Build and execute the SQL query using the escaped incorrect answers
    $sql = "INSERT INTO questions (Question, `Correct Answer`, `Incorrect Answer 1`, `Incorrect Answer 2`, `Incorrect Answer 3`)
            VALUES ('" . addslashes($question[0]) . "', '" . $question[1] . "', '" . $escapedIncorrectAnswers[0] . "', '" . $escapedIncorrectAnswers[1] . "', '" . $escapedIncorrectAnswers[2] . "')";

    if ($conn->query($sql) === TRUE) 
    {
        echo "New record created successfully";
    } else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

