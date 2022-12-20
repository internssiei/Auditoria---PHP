<?php

  $resultados ="";

         foreach ($auditorias as $row) {
             if($row->situacao != null && $row->situacao != ""){
                 $situacao = $row->situacao;
             }else{
                 $situacao = "Sem atualização";
            }
             $resultados .='<tr data-toggle="modal" data-target="#exampleModal"><td style="display:none">'.$row->Id.'</td>
             <td ><img src="'.$row->evidencia.'" style="max-width: 100px;"></td>
                   <td>'.$row->localizacao.'</td>
                   <td>'.$row->disciplina.'</td>
                   <td>'.$row->descricao.'</td>
                   <td>'.$row->situacao.'</td>
                   <td>'.$row->resposta.'</td>  
                   <td>'.date('d/m/y', strtotime($row->ultima_modificacao)).'</td> 
                   <td style="display:none">'.$row->evidencia.'</td> 

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
            #Tabela_Auditorias th{
            position: sticky;
            }
            #Tabela_Auditorias thead tr {
                height:80px;
                font-size:16px;
            }
            #Tabela_Auditorias td{
                font-size:16px;
                max-width: 100px;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
                cursor: pointer;
                
                }
            #Tabela_Auditorias tr.selecionado td{
            background-color: #aff7ff;
            }
                #SidebarIndex{
                    background: white;
                }
    </style>

<table class="table text-start align-middle table-bordered table-hover mb-0 table-sticky" id="Tabela_Auditorias">
                            <thead>
                                <tr class="text-dark" id="tittleAudit">
                                    <th scope="col" style="display:none">Id</th>
                                    <th scope="col">Evidência</th>
                                    <th scope="col">Localização</th>
                                    <th scope="col">Disciplina</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Resposta</th>
                                    <th scope="col">Última Modificação</th>
                                    <th scope="col" style="display:none">Link Image</th>
                                
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

             var tabela = document.getElementById("Tabela_Auditorias");
             var linhas = tabela.getElementsByTagName("tr");
              
                        var UpEvidenciaId = document.getElementById('UpEvidenciaId');
                        var UpImgEvidenciaId = document.getElementById('UpImgEvidenciaId');
                        var UpLocalizacaoId = document.getElementById('UpLocalizacaoId');
                        var UpDescricao = document.getElementById('UpDescricao');
                        var UpDisciplinaSelect = document.getElementById('UpDisciplinaSelect');
                        var UpSituacaoSelect = document.getElementById('UpSituacaoSelect');
                        var UpResposta = document.getElementById('UpResposta');
                        var UpAuditId = document.getElementById('UpAuditId');
                       
                        /**FIM */
             var dados = 0;


            for(var i = 0; i < linhas.length; i++){
	            var linha = linhas[i];
                linha.addEventListener("click", function(){
            //     dados = "";
  	        //         //Adicionar ao atual
              var tittleAudit = document.getElementById("tittleAudit");
                         tittleAudit.classList.remove("selecionado");
                         
                         selLinha(this, false);
                        

                     //loop para pegar os ítems da tabela
                         var selecionados = tabela.getElementsByClassName("selecionado");
                        for(var i = 0; i < selecionados.length; i++){
                                    var selecionado = selecionados[i];
                                    
                                     selecionado = selecionado.getElementsByTagName("td");
            //                          //debugger;

            //                          /**Evidencia */
                                      UpEvidenciaId.value = selecionado[8].innerHTML;
                                      UpImgEvidenciaId.src = selecionado[8].innerHTML;

            //                          /**Localização*/
                                      UpLocalizacaoId.value = selecionado[2].innerHTML;

            //                           /**Disciplina */
                                    $('#UpDisciplinaSelect  option[value="'+selecionado[3].innerHTML+'"]').prop("selected", true);
                                    $("#UpDisciplinaSelect").val(selecionado[3].innerHTML).change();

            //                         /**Descricao */
                                         UpDescricao.value = selecionado[4].innerHTML;
                                    
            //                           /**Situação(Status) */
            //                          //mudando select operação
                                     $('#UpSituacaoSelect  option[value="'+selecionado[5].innerHTML+'"]').prop("selected", true);
                                    $("#UpSituacaoSelect").val(selecionado[5].innerHTML).change();

            //                         /**Resposta */
                                         UpResposta.value = selecionado[6].innerHTML;

            //                         /**Id */
                                        UpAuditId.value = selecionado[0].innerHTML;


                                   }

                                        //Correção para caso pegue o TH do html
                                        var selecionadoth = selecionados[0].getElementsByTagName("th");
                                        if(selecionadoth != null){
                                            try{
                                                if(selecionadoth[0].innerHTML == "Id"){
                                                selecionados[0].classList.remove("selecionado");
                                                return;
                                                    }
                                                }
                                            catch{
                                            }
                                        }
                        $('#UpdateAuditoriaModal').modal('show');
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
