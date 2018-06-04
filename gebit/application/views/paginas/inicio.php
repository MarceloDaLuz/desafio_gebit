<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Desafio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="<?=base_url("css/bootstrap.css")?>" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?=base_url("css/bootstrap-grid.css")?>" />
</head>
<body>
    <div class="container">
            <div class="text-center">
                <h1>Jogo da Velha</h1>
            <?php 
                if($this->session->flashdata("status")){
            ?>
                <p class="alert alert-danger"><?=$this->session->flashdata("status")?></p>
            <?php
                }
                if($this->session->flashdata("salvo")){
            ?>
                <p class="alert alert-success"><?=$this->session->flashdata("salvo")?></p>
                
            <?php } ?>
            </div>
            <div class="login text-center">
                <h1>Escolha seu modo de jogo:</h1>
                <table class="table table-striped text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">
                                Contra PC
                            </th>
                            <th scope="col">
                                Contra Amigo
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php echo form_open("Inicio/modoJogo");?>
                        <tr>
                            <td>
                                <?php $pc = array('name'=>'modo','id'=>'modo', 'value' =>'pc','checked' => TRUE); echo form_radio($pc);?>
                            </td>
                            <td>
                                <?php $amigo = array('name'=>'modo','id'=>'modo', 'value' =>'amigo'); echo form_radio($amigo);?>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" style="text-align:center">
                                <?php echo form_button(array("class"=>"btn btn-primary","content"=>"Jogar","type"=>"submit"));?>
                            </td>
                        </tr>
                    </tfoot>
                    <?php echo form_close();?>
                </table>
                <br>
            </div>
        <?php if($partidas == null):?> 
            <div class="alert alert-dark" role="alert">
                            Estamos sem partida!
            </div>
        <?php else:?>
            <div class="jumbotron">
                <h1 class="display-4 text-center">Partidas</h1>
                <br>
                <hr>
                <table class="table  table-striped ">
                    <thead class="thead-dark">
                        <tr class="text-center">
                            <th scope="col">Jogador X</th>
                            <th scope="col">Jogador O</th>
                            <th scope="col">STATUS DA PARTIDA</th>
                            <th scope="col">REPLAY</th>
                        </tr>
                    </thead>
                    <tbody>            
                            <?php foreach($partidas as $partida):?>
                                <tr class="text-center">
                                    <td><?=$partida["XIS"]?></td>
                                    <td><?=$partida["CIRCULO"]?></td>
                                    <td><i><?=$partida["VENCEDOR"]?></i></td>
                                    <td><?=anchor("Jogo/replay/{$partida['ID']}",'Visualizar',array('class'=>'btn btn-link'))?></td>
                                </tr>
                            <?php endforeach?>
                    </tbody>
                </table>                        
            </div>
        <?php endif?>
    <div> 
</body>
</html>