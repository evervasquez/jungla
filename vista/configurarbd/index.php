<html>
    <form method="post" action="grabar.php">
        <fieldset>
            <legend><h1>CONFIGURACION DE BASE DE DATOS</h1></legend>
            <div><label>SGBD: </label>
            <select name="sgbd">
                <option value="0">- - Seleccionar - -</option>
                <option value="mysql">MySQL</option>            
                <option value="pgsql">PostgreSQL</option>            
                <option value="mssql">SQL Server</option>            
                <option value="oci">Oracle</option>            
            </select></div>
            <div><label>Usuario: </label><input type="text" name="usuario" value="" /></div>
            <div><label>Clave: </label><input type="password" name="contraseña" value="" /></div>
            <div><label>Host: </label><input type="text" name="host" value="" /></div>
            <div><label>Puerto: </label><input type="text" name="puerto" value="" /></div>
            <div><label>Base de Datos: </label><input type="text" name="basedatos" value="" /></div>
            <div><input type="submit" value="Guardar" /></div>
        </fieldset>
    </form>
</html>
<?php
?>
