<?php
	$servername = "localhost";
    $username = "root";
  	$password = "";
  	$dbname = "formulario";

	$conn = new mysqli($servername, $username, $password, $dbname);
      if($conn->connect_error){
        die("Conexión fallida: ".$conn->connect_error);
      }

    $salida = "";
 
    $query = "SELECT * FROM respuestas r
        INNER JOIN preguntas p ON r.preguntai = p.idPreguntas
        INNER JOIN usuario u ON r.usuarioi  = u.idusuario";

    if (isset($_POST['consulta'])) {
    	$q = $conn->real_escape_string($_POST['consulta']);
    	$query = "SELECT u.nombre, r.argumento, p.textoPregunta, p.tipo, p.formulario 
        FROM respuestas r
        INNER JOIN preguntas p ON r.preguntai = p.idPreguntas
        INNER JOIN usuario u ON r.usuarioi  = u.idusuario
        WHERE textoPregunta LIKE '%".$q."%' OR argumento LIKE '%".$q."%'  OR nombre LIKE '%".$q."%' OR tipo LIKE '%".$q."%' OR  formulario LIKE '%".$q."%'";

       // $query = "SELECT argumento FROM respuestas  WHERE argumento LIKE '%".$q."%'";
        
    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {
    	$salida.="<table class='table table-hover tabla-formulario'>
    			<thead>
    				<tr class='tabla-cabeza' style='color: white;' id='titulo'>

                        
    					<td>USUARIO</td>
    					<td>PREGUNTA</td>
    					<td>TIPO</td>
                        <td>RESPUESTA</td>
    					<td>IDENTIFICADOR DE FORMULARIO</td>
    					
    				</tr>

    			</thead>
    			

    	<tbody>";

    	while ($fila = $resultado->fetch_assoc()) {
    		$salida.="<tr>
                        
    					<td>".$fila['nombre']."</td>
                        <td>".$fila['textoPregunta']."</td>
                        <td>".$fila['tipo']."</td>
                        <td>".$fila['argumento']."</td>
                        <td>".$fila['formulario']."</td>
    				</tr>";

    	}
    	$salida.="</tbody></table>";
    }else{
    	$salida.="DATOS A BUSCAR...";
    }


    echo $salida;

    $conn->close();



?>