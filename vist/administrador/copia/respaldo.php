<?php 

//debemos ponerle contraseña al phpadmi, HACER RESPALDO A TODAS LAS BASES DE DATOS
//copiar los archivos mysqldump y mysql de la carpeta bin de mysql

$mysqlDatabaseName ='prueba';
$mysqlUserName ='root';
$mysqlPassword ='123456';
$mysqlHostName = 'localhost';
$mysqlExportpath = 'respaldo.sql';

//por favor, no haga ningun cambio en los siguientes puntos
//Exportacion de la base de datos y salida de estatus

$command ='mysqldump --opt -h' .$mysqlHostName.' -u' .$mysqlUserName.' --password="' .$mysqlPassword.'" ' .$mysqlDatabaseName.' > ' .$mysqlExportpath;
exec($command,$output,$worker);
switch($worker){
    case 0:
        echo 'la base de datos <b>' .$mysqlDatabaseName.'</b> se ha almecanado correctamente en la siguiente ruta'. getcwd() .'/' .$mysqlExportpath .'</b>';
        break;
        case 1:
            echo 'se ha producido un error al exportar <b>' .$mysqlDatabaseName . '</b> a' .getcwd().'/' .$mysqlExportpath .'</b>';
            break;
            case 2:
                echo 'Se ha producido un error de exportacion, compruebe la siguiente informacion : <br/><br/><table><tr><td>Nombre de la base de datos: </td><td><b> ' . $mysqlDatabaseName . '</b></td></tr><tr><td>Nombre de usuario MySQL: </td><td><b>' .$mysqlUserName .'</b></td></tr><tr><td> contraseña MySQL: </td><td><b> NOTSHOW </b></td></tr><tr><td> Nombre de host MySQL:</td><td><b>' .$mysqlHostName .'</b></td></tr></table>';
            break;
            
}

?>