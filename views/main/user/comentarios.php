<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentarios prueba</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>
    <section>
        <form method="POST" action="comentarios.php">
            <button type="submit" class="btn btn-info mb-4 mt-4">Mostrar comentarios</button>
        </form>
        
    <div style="border: 1px solid none; background-color:rgba(7,193,192, 0.1); margin-right: 53%; padding: 8px; border-radius: 5px; ">
    <form method="POST" action="">
            <div style=" padding: 8px; border-radius: 5px;"><label>Ingrese su mensaje</label>
            <label>Ingrese su comentario: </label><br>
            <textarea class="form-control mt-2" placeholder="Leave a comment here" rows="4" cols="80" maxlength="400" id="floatingTextarea2" style="height: 100px"></textarea>
            <br>
            <button type="submit" class="btn btn-success">Comentar</button>
            
        </div>
        </form>
        <hr>
        <?php   
        if (true) {
            echo"
                <table style=''>
                    <tr>
                    <td>Usuario</td>
                   <tr><td>Comentario: </td><td>pintar comentario</td></tr> 
                    </tr>
                </table>
                
                <button type='button' class='btn btn-outline'>Cerrar...</button>
            ";
        }
        ?>
    </div>

    </section>
    
</body>
</html>