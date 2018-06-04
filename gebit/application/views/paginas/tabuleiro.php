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
        <?php
            if($this->session->flashdata("status")):
        ?>
            <p><?php echo $this->session->flashdata("status")?></p>
        <?php endif?>

        <?php 
            $replay = $this->session->flashdata("replay");
            if($replay):?>
            <table class="table text-center">
                <thead class="thead-dark">
                    <th>Jogador X</th>
                    <th><h2><b>Jogo da Velha</b></h2></th>
                    <th>Jogador O</th>
                </thead>
                <br>
                <tbody class="table-bordered">
                    <tr class="table-info">
                        <td class="text-uppercase font-weight-bold"><?=$partida["XIS"]?></td>
                        <td class="font-italic">Vencedor : <?=$partida["VENCEDOR"]?></td>
                        <td class="text-uppercase font-weight-bold"><?=$partida["CIRCULO"]?></td>
                    </tr>
                    <tr>
                        <td><?=$partida["L1C1"]?></td>
                        <td><?=$partida["L1C2"]?></td>
                        <td><?=$partida["L1C3"]?></td>
                    </tr>
                    <tr>
                        <td><?=$partida["L2C1"]?></td>
                        <td><?=$partida["L2C2"]?></td>
                        <td><?=$partida["L2C3"]?></td>
                    </tr>
                    <tr>
                        <td><?=$partida["L3C1"]?></td>
                        <td><?=$partida["L3C2"]?></td>
                        <td><?=$partida["L3C3"]?></td>
                    </tr>                                        
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td><?=anchor('Jogo/sair','Inicio',array('class'=>'btn btn-info'))?></td>                        
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        <?php else:?>
        <table class="table">
            <?php echo form_open("Jogo/validar");?>
            <thead class="thead-dark text-center">
                    <tr>
                        <th class="text-left"></th>
                        <th><h2><b>Jogo da Velha</b></h2></th>
                        <th class="text-right"><?=anchor('Jogo/sair','Sair',array('class'=>'btn btn-danger'))?></th>
                    </tr>
                        <tr>
                            <th>Jogador X : <?=$jogadorx;?></th>
                            <th>
                                <?php
                                $data = array(
                                    'jogadorx'  => $jogadorx,
                                    'jogadoro' => $jogadoro
                                );

                                echo form_hidden($data);   
                                echo form_label("","vencedor");
                                echo form_input(array(
                                        "name"=>"vencedor",
                                        "id"=>"vencedor",
                                        "class"=>"form-control",
                                        "maxlength"=>'10',
                                        "placeholder"=>"Vencedor"
                                    ));
                                ?>
                            </th>
                            <th>Jogador O : <?=$jogadoro;?></th>
                        </tr>
            </thead>
                <tbody class="text-center">
                <?php 
                    $a = $this->session->userdata("modo-jogo");
                    if($a == "amigo"):
                ?>     
                    <tr>
                        <td colspan="3">
                            <p><b> INSTRUÇÕES:</b> após inserir o primeiro valor dar dois cliques no mesmo quadrado!</p>
                        </td>
                    </tr>
                <?php endif?>
                    <tr>
                        <td>
                            <?php
                                echo form_label("","l1c1");
                                echo form_input(array(
                                        "name"=>"l1c1",
                                        "id"=>"l1c1",
                                        "class"=>"form-control",
                                        "maxlength"=>'1',
                                        "onClick"=>"proximoMovimento('l1c1')"
                                    ));
                            ?>
                        </td>
                        <td>
                            <?php
                                echo form_label("","l1c2");
                                echo form_input(array(
                                        "name"=>"l1c2",
                                        "id"=>"l1c2",
                                        "class"=>"form-control",
                                        "maxlength"=>"1",
                                        "onClick"=>"proximoMovimento('l1c2')"
                                    ));
                            ?>
                        </td>
                        <td>
                            <?php
                                echo form_label("","l1c3");
                                echo form_input(array(
                                        "name"=>"l1c3",
                                        "id"=>"l1c3",
                                        "class"=>"form-control",
                                        "maxlength"=>"1",
                                        "onClick"=>"proximoMovimento('l1c3')"
                                    ));
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php
                                echo form_label("","l2c1");
                                echo form_input(array(
                                        "name"=>"l2c1",
                                        "id"=>"l2c1",
                                        "class"=>"form-control",
                                        "maxlength"=>"1",
                                        "onClick"=>"proximoMovimento('l2c1')"
                                    ));
                            ?>
                        </td>
                        <td>
                            <?php
                                echo form_label("","l2c1");
                                echo form_input(array(
                                        "name"=>"l2c2",
                                        "id"=>"l2c2",
                                        "class"=>"form-control",
                                        "maxlength"=>"1",
                                        "onClick"=>"proximoMovimento('l2c2')"
                                    ));
                            ?>
                        </td>
                        <td>
                            <?php
                                echo form_label("","l2c2");
                                echo form_input(array(
                                        "name"=>"l2c3",
                                        "id"=>"l2c3",
                                        "class"=>"form-control",
                                        "maxlength"=>"1",
                                        "onClick"=>"proximoMovimento('l2c3')"
                                    ));
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php
                                echo form_label("","l3c1"); 
                                echo form_input(array(
                                        "name"=>"l3c1",
                                        "id"=>"l3c1",
                                        "class"=>"form-control",
                                        "maxlength"=>"1",
                                        "onClick"=>"proximoMovimento('l3c1')"
                                    ));
                            ?>
                        </td>
                        <td>
                            <?php
                                echo form_label("","l3c2");
                                echo form_input(array(
                                        "name"=>"l3c2",
                                        "id"=>"l3c2",
                                        "class"=>"form-control",
                                        "maxlength"=>"1",
                                        "onClick"=>"proximoMovimento('l3c2')"
                                    ));
                            ?>
                        </td>
                        <td>
                            <?php
                                echo form_label("","l3c3");
                                echo form_input(array(
                                        "name"=>"l3c3",
                                        "id"=>"l3c3",
                                        "class"=>"form-control",
                                        "maxlength"=>"1",
                                        "onClick"=>"proximoMovimento('l3c3')"
                                    ));
                            ?>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr class="text-center">
                        <td colspan="3">
                            <?php 
                                    $data = array(
                                            'jogadorx'  => $jogadorx,
                                            'jogadoro' => $jogadoro
                                    );
                                    echo form_hidden($data);
                                echo form_button(array(
                                        "class"=>"btn btn-success",
                                        "content"=>"Validar",
                                        "type"=>"submit"
                                ));
                            ?>
                        </td>
                    </tr>
                </tfoot>
            <?php echo form_close();?>
        </table>
        <?php endif?>
    </div>
<script>
    var primeiro_movimento = true;
    var proximo = "";
    var rodada = 0;
    var vencedor = "";
    var modoJogo = "<?=$a = $this->session->userdata("modo-jogo")?>";
    var pc = false;
    //marcadores
    var xis = "x";
    var circulo = "o";
    var vazio = "";

    function proximoMovimento(coordenada){


        switch (modoJogo) {
            case "pc":
                var jogadorx = "<?php echo $jogadorx?>";
                var jogadoro = "<?php echo $jogadoro?>";

                //ler todos os campos 
                if(jogadorx=="computador"){
                    if(primeiro_movimento == true){
                        primeiro_movimento = false;
                        movimentoJogador(coordenada,circulo);
                        rodada= rodada + 1 ;
                        movimentoPc(xis);
                        rodada= rodada + 1 ;
                    }else{
                        var valor = document.getElementById(coordenada).value;
                        if(valor ==""){
                            movimentoJogador(coordenada,circulo);
                            rodada= rodada + 1 ;
                            verificarVencedor();
                            movimentoPc(xis);
                            rodada= rodada + 1 ;
                            verificarVencedor();
                        }else{
                            movimentoJogador(coordenada,valor);
                            verificarVencedor();
                        }
                    }
                }else if(jogadoro=="computador"){   
                    if(primeiro_movimento == true){
                        primeiro_movimento = false;
                        movimentoJogador(coordenada,xis);
                        rodada= rodada + 1 ;
                        movimentoPc(circulo);
                        rodada= rodada + 1 ;
                    }else{
                        var valor = document.getElementById(coordenada).value;
                        if(valor ==""){
                            movimentoJogador(coordenada,xis);
                            rodada= rodada + 1 ;
                            verificarVencedor();
                            rodada= rodada + 1 ;
                            movimentoPc(circulo);
                            verificarVencedor();
                        }else{
                            primeiro_movimento=false;
                            movimentoJogador(coordenada,valor);
                            verificarVencedor();
                        }
                    }
                }
        
                break;
            case "amigo":
            var valor = document.getElementById(coordenada).value;
                if(primeiro_movimento == true){
                    if(valor == ""){
                        console.log('esperando um valor!');
                    }else{
                        if(valor ==xis){
                            proximo = circulo;
                            primeiro_movimento = false;
                            movimentoJogador(coordenada,valor);
                            rodada= rodada + 1;
                            verificarVencedor();
                            
                        }else{
                            proximo = xis;
                            primeiro_movimento = false;
                            movimentoJogador(coordenada,valor);
                            rodada= rodada + 1;
                            verificarVencedor();
                            
                        }
                    }
                }else{
                    if(proximo== xis && valor == vazio){
                        movimentoJogador(coordenada,proximo);
                        proximo=circulo;
                        rodada= rodada + 1;
                        verificarVencedor();
                        
                    }else if(proximo == circulo && valor == vazio){
                        movimentoJogador(coordenada,proximo)    
                        proximo =xis;
                        rodada= rodada + 1;
                        verificarVencedor();

                    }else{
                        movimentoJogador(coordenada,valor);
                        verificarVencedor();
                    }
                }
                break;
        }
    }
    function movimentoJogador(coordenada,marcador){
        var jogada = document.getElementById(coordenada).setAttribute('value',marcador);
        return jogada;
    }
    function movimentoPc(marcador){
        //linha 1
        var valor1 = document.getElementById('l1c1').value;
        var valor2 = document.getElementById('l1c2').value;
        var valor3 = document.getElementById('l1c3').value;
        
        //linha 2
        var valor4 = document.getElementById('l2c1').value;
        var valor5 = document.getElementById('l2c2').value;
        var valor6 = document.getElementById('l2c3').value;
        
        //linha 3
        var valor7 = document.getElementById('l3c1').value;
        var valor8 = document.getElementById('l3c2').value;
        var valor9 = document.getElementById('l3c3').value;

        if(valor1 == vazio){
            //verifica a primeira posicao na tabela
            var jogadapc = document.getElementById('l1c1').setAttribute('value',marcador);
            return jogadapc;
        }else if(valor2 == vazio && valor3 == vazio){
            //verifica o restante da primeira linha
            var jogadapc = document.getElementById('l1c2').setAttribute('value',marcador);
            return jogadapc;
        }else if(valor2 == vazio){
            //verifica a segunda posicao na tabela
            var jogadapc = document.getElementById('l1c2').setAttribute('value',marcador);
            return jogadapc;
        }else if(valor3 == vazio){
            //verifica a terceira posicao na tabela
            var jogadapc = document.getElementById('l1c3').setAttribute('value',marcador);
            return jogadapc;
        }else if(valor5 == vazio && valor7){
            var jogadapc = document.getElementById('l2c2').setAttribute('value',marcador);
            return jogadapc;
        }else if(valor4 == vazio && valor7== vazio){
            //verifica a primeira coluna
            var jogadapc = document.getElementById('l2c1').setAttribute('value',marcador);
            return jogadapc;
        }else if(valor4 == vazio){
            //verifica a quarta posicao na tabela
            var jogadapc = document.getElementById('l2c1').setAttribute('value',marcador);
            return jogadapc;
        }else if(valor7 == vazio){
            //verifica a setima posicao da tabela 
            var jogadapc = document.getElementById('l3c1').setAttribute('value',marcador);
            return jogadapc;
        }else if(valor5 == vazio && valor8 == vazio){
            //verifica a segunda coluna 
            var jogadapc = document.getElementById('l2c2').setAttribute('value',marcador);
            return jogadapc;
        }else if(valor5 == vazio){
            //verifica a quinta posicao da tabela
            var jogadapc= document.getElementById('l2c2').setAttribute('value',marcador);
            return jogadapc;
        }else if(valor6 == vazio){
            //verifica a sexta posicao da tabela 
            var jogadapc = document.getElementById('l2c3').setAttribute('value',marcador);
            return jogadapc;
        }else if(valor8 == vazio && valor9 == vazio){
            //verifica a terceira linha da tabela
            var jogadapc = document.getElementById('l3c2').setAttribute('value',marcador);
            return jogadapc;
        }else if(valor8 == vazio){
            //verifica a oitava posicao da tabela
            var jogadapc = document.getElementById('l3c2').setAttribute('value',marcador);
            return jogadapc;
        }else if(valor9 == vazio){
            //verifica a nona posicao da tabela
            var jogadapc= document.getElementById('l3c3').setAttribute('value',marcador);
            return jogadapc;
        }
    }

    function verificarVencedor(){
        if(vencedor ==vazio){
            var jogadorx = "<?php echo $jogadorx?>";
            var jogadoro = "<?php echo $jogadoro?>";
            //linha 1
            var valor1 = document.getElementById('l1c1').value;
            var valor2 = document.getElementById('l1c2').value;
            var valor3 = document.getElementById('l1c3').value;
            //linha 2
            var valor4 = document.getElementById('l2c1').value;
            var valor5 = document.getElementById('l2c2').value;
            var valor6 = document.getElementById('l2c3').value;
            //linha 3
            var valor7 = document.getElementById('l3c1').value;
            var valor8 = document.getElementById('l3c2').value;
            var valor9 = document.getElementById('l3c3').value;
            
                /*
                    1 | 2 | 3
                    ----------
                    4 | 5 | 6
                    ----------
                    7 | 8 | 9
                */
            // analisa a tabela para verificar se não a um vencedor 
            if(valor1==xis && valor2 == xis && valor3== xis){
                vencedor = xis;
            }else if(valor1==circulo && valor2 == circulo && valor3== circulo){
                vencedor = circulo;
            }else if(valor1 == xis && valor4 == xis && valor7 == xis){
                vencedor = xis;
            }else if(valor1 == circulo && valor4 == circulo && valor7 == circulo){
                vencedor = circulo;
            }else if(valor1 == xis && valor5 == xis && valor9 == xis){
                vencedor = xis;
            }else if(valor1 == circulo && valor5 == circulo && valor9 == circulo){
                vencedor = circulo;
            }else if(valor2 == xis && valor5== xis && valor8 == xis){
                vencedor = xis;
            }else if(valor2 == circulo && valor5== circulo && valor8==circulo){
                vencedor = circulo;
            }else if(valor3 == xis && valor6== xis && valor9 == xis){
                vencedor = xis;
            }else if(valor3 == circulo && valor6 == circulo && valor9 == circulo){
                vencedor = circulo;
            }else if(valor4 == xis && valor5 == xis && valor6 == xis){
                vencedor = xis;
            }else if(valor4 == circulo && valor5 == circulo && valor6 == circulo){
                vencedor = circulo;
            }else if(valor7 == xis && valor8 == xis && valor9 == xis){
                vencedor = xis;
            }else if(valor7 == circulo && valor8 == circulo && valor9 == circulo){
                vencedor = circulo;
            }else if(valor3 == xis && valor5 == xis && valor7 == xis){
                vencedor = xis;
            }else if(valor3 == circulo && valor5 == circulo && valor7 == circulo){
                vencedor = circulo;
            }
            //verifica qual é o vencedor
            if(vencedor == xis){               
                alert("Parabens <?=$jogadorx;?> você venceu!\n Não esqueça de clicar em 'Validar'  para salvar no banco de dados");
                var tipovencedor = document.getElementById('vencedor').setAttribute('value',xis);
            }
            if(vencedor==circulo){
                alert("Parabens <?=$jogadoro;?> você venceu!\n Não esqueça de clicar em 'Validar'  para salvar no banco de dados");
                var tipovencedor = document.getElementById('vencedor').setAttribute('value',circulo);
            }
            if(vencedor==vazio && rodada>=9){
                alert("empate\n Não esqueça de clicar em 'Validar'  para salvar no banco de dados");            
                var tipovencedor = document.getElementById('vencedor').setAttribute('value','empate');
            }
            return tipovencedor;
        }else {
            if(vencedor == circulo){
                alert("Vencedor : <?php echo $jogadoro?>");
            }else{
                alert("Vencedor : <?php echo $jogadorx?>");
            }
            
        }        
    }
</script>
</body>
</html>