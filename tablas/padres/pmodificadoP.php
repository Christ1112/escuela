<?php
include "../../encabezado.php";
?>
<!--PARTE DE ARRIBA CARG------------------------------------------------------------------------------------------------------------------------->
<body class="formulario-inicio" style="background-color: black;">
  <?php
    if(isset($_POST['Actualizar
    '])){
        if(!empty($_POST['marca'])){
            foreach($_POST['marca'] as $selected){
                //echo $selected."</br>";
            }
        }
    }

    $V1 = @$_POST['V1'];
    $V2 = @$_POST['V2'];
    $V3 = @$_POST['V3'];
    $V4 = @$_POST['V4'];
    $V5 = @$_POST['V5'];
    $V6 = @$_POST['V6'];

    $usuario = "root";
    $password = "";
    $servidor = "127.0.0.1";
    $basededatos = "escuela";
    
$conexion = mysqli_connect( $servidor, $usuario, "" ) or die ("No se ha podido conectar al servidor de Base de Datos");
$db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );


$query="UPDATE `padres` SET `nombre` = '".$V2."',`apellidoMaterno` = '".$V3."',`apellidoPaterno` = '".$V4."', `correo` = '".$V5."', `numero` = '".$V6."' WHERE `padres`.`IDPP` = ".$V1.";";
$resul = mysqli_query( $conexion, $query ) or die ( "Algo ha ido mal en la consulta a la base de datos ");

$query="SELECT * FROM `padres`;";
$resul = mysqli_query( $conexion, $query ) or die ( "Algo ha ido mal en la consulta a la base de datos ");

echo "<div class='container'>";
    echo "<div class='row'>";
    echo "<div class='col'>";
    echo "</div>";
    echo "<div class='col-12'>";

echo "<br><br><table style='width: 100%;' border='1'>";
echo "<tr>";
echo "<td bgcolor='#A9D0FF'>Marcar</td>";
      echo "<td bgcolor='#71BEFF'>ID</td>";
      echo "<td bgcolor='#A9D0FF'>Nombre</td>";
      echo "<td bgcolor='#71BEFF'>Apellido Paterno</td>";
      echo "<td bgcolor='#A9D0FF'>Apellido Materno</td>";
      echo "<td bgcolor='#71BEFF'>Correo</td>";
      echo "<td bgcolor='#A9D0FF'>Numero</td>";
      echo "</td>";

      while ($columna = mysqli_fetch_array( $resul )){

        echo "<tr>";
           echo "<td><input type='checkbox' name='marca[]' value='".$columna['IDPP']."'></td>";
           echo "<td style='color: #fff;'>".$columna['IDPP']."</td>";
        echo "<td style='color: #fff;'>".$columna['nombre']."</td>";
        echo "<td style='color: #fff;'>".$columna['apellidoPaterno']."</td>";
        echo "<td style='color: #fff;'>".$columna['apellidoMaterno']."</td>";
        echo "<td style='color: #fff;'>".$columna['correo']."</td>";
        echo "<td style='color: #fff;'>".$columna['numero']."</td>";
           echo "</td>";
    }
echo "</table>";
echo "<br><h2 style='color: #fff;'>¡Modificado con Éxito!</h2><br>";
echo "<a href='pconsultar.php' class='btn' style='background-color: #694a24; color: white;'>Ir a inicio</a>";

echo "</div>";
    echo "<div class='col'>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";

mysqli_close ( $conexion );
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
//<!--FOOTHER------------------------------------------------------------------------------------------------------------------------------------->
include "../../foother.php";
?>