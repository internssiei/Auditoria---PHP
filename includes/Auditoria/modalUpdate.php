<?php
      $query = "select DISTINCT(disciplina) FROM itensauditoria WHERE disciplina != ''  ORDER BY disciplina ASC;";
      $query2 = "select DISTINCT(situacao) FROM itensauditoria WHERE situacao != '' ORDER BY situacao ASC;";
  //  $query3 = "select DISTINCT(clienteUn) FROM projetos;";
  //  $query4 = "select DISTINCT(local) FROM projetos;";
  //  $query5 = "select DISTINCT(situacao) FROM projetos WHERE situacao IS NOT NULL AND situacao != '';";
      $disciplina = mysqli_query($conexao, $query);
      $situacao = mysqli_query($conexao, $query2);
  //  $cliente = mysqli_query($conexao, $query3);
  //  $local = mysqli_query($conexao, $query4);
  //  $status = mysqli_query($conexao, $query5);

?>

<div class="modal fade" id="UpdateAuditoriaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <p id="modal_body"></p>
        <h5 class="modal-title" id="exampleModalLabel">Auditoria Projeto</h5>
        <button type="button" class="close" onclick="closeUpdateModal()" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form method="post">
                <div class="modal-body">      
                  <div class="bg-light rounded h-100 p-4">
                  <div class="form-floating form-group">
                    <img id="UpImgEvidenciaId" style="max-width : 200px; max-heigth : 200px" src="" alt="">
                  </div>
                  <br>
                  <div class="form-floating form-group mb-3">
                                  <input type="text" class="form-control" name="UpEvidenciaId" id="UpEvidenciaId"
                                      placeholder="Evidência" required>
                                  <label for="UpEvidenciaId">Evidência</label>
                          </div>

                          <div class="form-floating form-group mb-3">
                              <input type="text" class="form-control" id="UpLocalizacaoId" name="UpLocalizacaoId"
                                  placeholder="Localização" required>
                              <label for="LocalizacaoId">Localização</label>
                          </div>

                          <div class="form-floating form-group mb-3">
                               <select class="form-select" id="UpDisciplinaSelect" name="UpDisciplinaSelect" 
                                aria-label="Floating label select example" >
                                 <option selected disabled value="">Selecione uma Disciplina</option> 
                              <?php
                                   if (mysqli_num_rows($disciplina)) {
                                     while ($row = mysqli_fetch_array($disciplina)) {
                                         echo "<option value=".$row['disciplina'].">{$row['disciplina']}</td>";
                                     }
                                 } 
                              ?> 
                              </select>
                          
                              <label for="DisciplinaSelect">Disciplina</label>
                          </div>


                          

                          <div class="form-floating form-group">
                              <textarea class="form-control" placeholder="Informe o título do projeto"
                                  id="UpDescricao" name="UpDescricao" style="height: 100px;" required></textarea >
                              <label for="Descricao">Descrição</label>
                          </div>                          
                          <br>
                              <!-- -----------------SELECT SECTION----------------------- -->
                          <div class="form-floating form-group mb-1 col-4" style="display: inline-block;">
                              <select class="form-select" id="UpSituacaoSelect" name="UpSituacaoSelect" 
                                aria-label="Floating label select example" >
                                <option selected disabled value="">Situação</option>
                              <?php
                                  if (mysqli_num_rows($situacao)) {
                                    while ($row2 = mysqli_fetch_array($situacao)) {
                                        echo "<option value=".$row2['situacao'].">{$row2['situacao']}</td>";
                                    }
                                } 
                              ?> 
                              </select>
                              <label for="UpSituacaoSelect">Situação</label>
                          </div>

                          <br>
                          <br>

                          <div class="form-floating form-group">
                              <textarea class="form-control" placeholder="Informe o título do projeto"
                                  id="UpResposta" name="UpResposta" style="height: 100px;"></textarea >
                              <label for="Resposta">Resposta</label>
                          </div>


                                            <!------ID DIV-------->
                                            <div class="form-floating form-group mb-3" style="display:none">
                                                  <input type="integer" class="form-control" name="UpAuditId" id="UpAuditId"
                                                      placeholder="Id" required>
                                                  <label for="UpAuditId">id</label>
                                              </div>
                                               <!------ID DIV-------->
                                            <br>         


                                  <!-- ----------------- END SELECT SECTION----------------------- -->
                                </div>
                              </div>
                            <div class="modal-footer">
                              <a type="button" name ="Excluir" type="button" class="btn btn-danger m-1" style="right: 300px; position:relative"onclick="OpenConfirmModal()">Excluir</a>  
                               
                              <button type="submit" name ="Atualizar" class="btn btn-success" onclick="send('Atualizar')">Editar</button>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
<script type="text/javascript">

  

function OpenConfirmModal(){
  $('#ConfirmModal').on('shown.bs.modal', function () {
    //  debugger;
    var ConfirmIDId = document.getElementById('ConfirmIDId');
    var UpAuditId = document.getElementById('UpAuditId');
    ConfirmIDId.value =  UpAuditId.value;
});
        $('#ConfirmModal').modal('show');
    } 

  
    function closeUpdateModal(){
      //alert("teste");
        $('#UpdateAuditoriaModal').modal('hide');
} 


</script>


