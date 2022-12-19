<?php

  $resultados ="";
        foreach ($projetos as $row) {
            if($row->situacao != null && $row->situacao != ""){
                $situacao = $row->situacao;
            }else{
                $situacao = "Sem atualização";
            }
            $resultados .='<tr data-toggle="modal" data-target="#exampleModal"><td>'.$row->projeto.'</td>
                  <td>'.$row->operacao.'</td>
                  <td>'.$row->area.'</td>
                  <td>'.$row->plataforma.'</td>
                  <td>'.$row->clienteUn.'</td>
                  <td>'.$row->local.'</td>
                  <td>'.$situacao.'</td>
                  <td style="display:none">'.$row->ID.'</td>
                  <td style="display:none">'.$row->titulo.'</td>
                  </tr>';

                 //
        }

?>
<style type="text/css">

            .table-responsive {
            border-spacing: 1px;
            border-collapse: collapse;
            background:white;
            border-radius:6px;
            overflow-x:hidden;
            min-height:600px;
            max-width:1368px;
            max-height:600px;
            width:100%;
            margin:0 auto;
            position:relative;
                }

            *{ position:relative }

            .table-sticky th {
            background: #fff;
            position: sticky;
            top: -1px;
            z-index: 990;

            }
            #Tabela_Projetos th{
            position: sticky;
            }
            #Tabela_Projetos thead tr {
                height:80px;
                font-size:16px;
            }
            #Tabela_Projetos td{
                font-size:14px;
                max-width:200px;
                height:30px;
                cursor: pointer;
                }

            /* #ProjetosTable tr:hover td{
            background-color: #feffb7;
            } */

            /**C:checked quando selecionado**/
            #Tabela_Projetos tr.selecionado td{
            background-color: #aff7ff;
            }
                #SidebarIndex{
                    background: white;
                }
    </style>

<table class="table text-start align-middle table-bordered table-hover mb-0 table-sticky" id="Tabela_Projetos">
                            <thead>
                                <tr class="text-dark" id="tittle_Projeto">
                                    <th scope="col" >Projeto</th>
                                    <th scope="col">Operação</th>
                                    <th scope="col">Área</th>
                                    <th scope="col">Plataforma</th>
                                    <th scope="col">Cliente/Unidade</th>
                                    <th scope="col">Local</th>
                                    <th scope="col">Status</th>
                                    <th style="display:none" scope="col">ID</th>
                                    <th style="display:none" scope="col">Titulo</th>
                                    <!-- <th scope="col">Actions</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php


                              echo $resultados;

                                ?>
                            </tbody>
                        </table>





    <script type="text/javascript">
           //debugger;

             var tabela = document.getElementById("Tabela_Projetos");
             var linhas = tabela.getElementsByTagName("tr");
             /**OBTENDO DADOS PARA MODAL ATUALIZAR */
                        var UpProjetoId = document.getElementById('UpProjetoId');

                        var UpAreaId = document.getElementById('UpAreaId');
                        var UpOperacaoSelect = document.getElementById('UpOperacaoSelect');
                        var UpTituloProjeto = document.getElementById('UpTituloProjeto');
                        var UpPlataformaSelect = document.getElementById('UpPlataformaSelect');
                        var UpClienteSelect = document.getElementById('UpClienteSelect');
                        var UpLocalSelect = document.getElementById('UpLocalSelect');
                        var UpStatusSelect = document.getElementById('UpStatusSelect');
                        var UpIDId = document.getElementById('UpIDId');
                       
                        /**FIM */
             var dados = 0;


            for(var i = 0; i < linhas.length; i++){
	            var linha = linhas[i];
                linha.addEventListener("click", function(){
                dados = "";
  	                //Adicionar ao atual
                      var tittleProjetoId = document.getElementById('tittle_Projeto'); 
                         tittleProjetoId.classList.remove("selecionado");
                        try {
                            selLinha(this, false);
                            
                        //loop para pegar os ítems da tabela
                        var selecionados = tabela.getElementsByClassName("selecionado");
                        for(var i = 0; i < selecionados.length; i++){
                                    var selecionado = selecionados[i];
                                    selecionado = selecionado.getElementsByTagName("td");
                                     //debugger;
                                     /**PROJETO */
                                     UpProjetoId.value = selecionado[0].innerHTML;

                                     /**AREA */
                                     UpAreaId.value = selecionado[2].innerHTML;

                                      /**OPERAÇÃO */
                                     //mudando select operação
                                    $('#UpOperacaoSelect  option[value="'+selecionado[1].innerHTML+'"]').prop("selected", true);
                                     $("#UpOperacaoSelect").val(selecionado[1].innerHTML).change();

                                    /**TITULO */
                                      UpTituloProjeto.value = selecionado[8].innerHTML;

                                    /**PLATAFORMA */
                                    //mudando select Plataforma
                                    $('#UpPlataformaSelect  option[value="'+selecionado[3].innerHTML+'"]').prop("selected", true);
                                     $("#UpPlataformaSelect").val(selecionado[3].innerHTML).change();

                                    /**CLIENTE */
                                    //mudando select Cliente
                                    $('#UpClienteSelect  option[value="'+selecionado[4].innerHTML+'"]').prop("selected", true);
                                     $("#UpClienteSelect").val(selecionado[4].innerHTML).change();

                                    /**LOCAL */
                                    //mudando select Local
                                    $('#UpLocalSelect  option[value="'+selecionado[5].innerHTML+'"]').prop("selected", true);
                                     $("#UpLocalSelect").val(selecionado[5].innerHTML).change();


                                    /**STATUS("situação") */
                                    //mudando select Status
                                    // $('#UpStatusSelect  option[value="'+selecionado[6].innerHTML+'"]').prop("selected", true);
                                    // alert(selecionado[6].innerHTML);
                                     $("#UpStatusSelect").val(selecionado[6].innerHTML).change();

                                     UpIDId.value = selecionado[7].innerHTML;
                                    
                                    // ConfirmIDId.value = selecionado[7].innerHTML;
                                    
                                  }

                                  $('#updateModal').modal('show');


                        } catch {
                                    
                            }                      
                       
	                });


                    function selLinha(linha, multiplos){
                        if(!multiplos){
                            var linhas = linha.parentElement.getElementsByTagName("tr");
                                for(var i = 0; i < linhas.length; i++){
                                var linha_ = linhas[i];
                                linha_.classList.remove("selecionado");
                                dados = 0;
                                }
                        }
                        linha.classList.toggle("selecionado");
                        }

     }



     </script>
