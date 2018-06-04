<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Jogo da Velha Contra o PC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="<?=base_url("css/bootstrap.css")?>" />
</head>
<body>
    <span class="text-center"><h1>Bem vindo ao jogo contra PC</h1></span>
    
    <div class="container">
        <div class="jumbotron text-center">
            <?= validation_errors("<p class='alert alert-danger'>","</p>")?>
        <?php
                        echo form_open("Jogo/jogar");
                            echo form_label("Nome","nome");
                            echo form_input(array(
                                "name"=>"nome",
                                "id"=>"nome",
                                "class"=>"form-control",
                                "maxlenght"=>"200"
                            ));
                            echo "<br>";
                            echo form_label("Jogador X","marcador");
                           $x = array(
                                'name'          => 'marcador',
                                'id'            => 'marcador',
                                'value'         => 'x',
                                'checked'       => TRUE,
                                'style'         => 'margin:10px'
                            );
                            echo form_radio($x);
                           echo form_label("Jogador O","marcador");
                           $o = array(
                                'name'          => 'marcador',
                                'id'            => 'marcador',
                                'value'         => 'o',
                                'checked'       => FALSE,
                                'style'         => 'margin:10px'
                            );
                            echo form_radio($o);
                            echo "<br>";
                            echo form_button(array(
                                "class"=>"btn btn-primary",
                                "content"=>"Jogar",
                                "type"=>"submit"
                            ));
                        echo form_close();
            ?>
        </div>
    </div>
</body>
</html>