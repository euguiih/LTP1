<?php

    include "config.php";

        if(isset($_POST['update'])){
            $primeironome = $_POST['primeironome'];
            $ultimonome = $_POST['ultimonome'];
            $id = $_POST['id'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $genero = $_POST['genero'];

            $sql = "UPDATE `cliente`.`usuarios` SET
            `primeironome` = '$primeironome', 
            `ultimonome` = '$ultimonome',
            `email` = '$email',
            `password` = '$password',
            `genero` = '$genero'
            WHERE `id`= '$id' ";

            $result = $conn->query($sql);

            if($result == TRUE){
                echo "Atualizado com sucesso!";
            }else{
                echo "erro:" .$sql."<br>" . $conn->error;
            };
        }

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "SELECT * FROM `cliente`.`usuarios` WHERE `id`='$id'";
        $result = $conn->query($sql);

        if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                $primeironome = $row['primeironome'];
                $ultimonome = $row['ultimonome'];
                $email = $row['email'];
                $password= $row['password'];
                $genero = $row['genero'];
                $id = $row['id'];
            }
?>

        <h2>Formulário de Atualização</h2>

        <form action="" method="post">
            <fieldset>
                <legend>Informação pessoal:</legend>
                Primeiro Nome: <br>
                <input type="text" name="primeironome" value="<?php echo $primeironome;?>">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <br>
                Ultimo nome: 
                <input type="text" name="ultimonome" value="<?php echo $ultimonome;?>">
                <br>
                E-mail: 
                <input type="email" name="email" value="<?php echo $email;?>">
                <br>
                Password: 
                <input type="password" name="password" value="<?php echo $password;?>">
                <br>
                Genero: 
                <input type="radio" name="genero" value="Masculino" <?php if ($genero == 'Masculino') echo "checked" ?>> Masculino
                <input type="radio" name="genero" value="Feminino" <?php if ($genero == 'Feminino') echo "checked" ?>> Feminino 
                <input type="radio" name="genero" value="Outros" <?php if ($genero == 'Outros') echo "checked" ?>> Outros 

                <br><br>
                
                <input type="submit" value="update" name="update">

            </fieldset>
        </form>
    <?php

        }else {
                header('Location:consultar.php');
            }
        }
    ?> 