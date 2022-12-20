<?php
   $query = "select DISTINCT(operacao) FROM Audit_Projetos ORDER BY operacao ASC;";
   $query2 = "select DISTINCT(plataforma) FROM Audit_Projetos;";
   $query3 = "select DISTINCT(clienteUn) FROM Audit_Projetos;";
   $query4 = "select DISTINCT(local) FROM Audit_Projetos;";
   $query5 = "select DISTINCT(situacao) FROM Audit_Projetos WHERE situacao IS NOT NULL AND situacao != '';";
   $operacao = mysqli_query($conexao, $query);
   $plataforma = mysqli_query($conexao, $query2);
   $cliente = mysqli_query($conexao, $query3);
   $local = mysqli_query($conexao, $query4);
   $status = mysqli_query($conexao, $query5);

?>
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                          <div class="form-floating form-group mb-3">
                                  <input type="text" class="form-control" name="UpProjetoId" id="UpProjetoId"
                                      placeholder="Projeto" required>
                                  <label for="ProjetoId">Projeto</label>
                          </div>

                          <div class="form-floating form-group mb-3">
                               <select class="form-select" id="UpOperacaoSelect" name="UpOperacaoSelect" 
                                aria-label="Floating label select example" required>
                                 <option selected disabled value="">Selecione uma Operação</option> 
                              <?php
                                   if (mysqli_num_rows($operacao)) {
                                     while ($row = mysqli_fetch_array($operacao)) {
                                         echo "<option value=".$row['operacao'].">{$row['operacao']}</td>";
                                     }
                                 } 
                              ?> 
                              </select>
                              <label for="UpOperacaoSelect">Operação</label>
                          </div>








                          <div class="form-floating form-group mb-3">
                              <input type="text" class="form-control" id="UpAreaId" name="UpAreaId"
                                  placeholder="Área" required>
                              <label for="UpAreaId">Área</label>
                          </div>

                          

                          <div class="form-floating form-group">
                              <textarea class="form-control" placeholder="Informe o título do projeto"
                                  id="UpTituloProjeto" name="UpTituloProjeto" style="height: 100px;" required></textarea >
                              <label for="UpTituloProjeto">Título</label>
                          </div>
                              <br>
                              
                              <!-- -----------------SELECT SECTION----------------------- -->
                          <div class="form-floating form-group mb-1 col-5" style="display: inline-block;">
                              <select class="form-select" id="UpPlataformaSelect" name="UpPlataformaSelect" 
                                aria-label="Floating label select example" required>
                                <option selected disabled value="">Plataforma</option>
                              <?php
                                  if (mysqli_num_rows($plataforma)) {
                                    while ($row2 = mysqli_fetch_array($plataforma)) {
                                        echo "<option value=".$row2['plataforma'].">{$row2['plataforma']}</td>";
                                    }
                                } 
                              ?> 
                              </select>
                              <label for="UpPlataformaSelect">Plataforma</label>
                          </div>

                          <div class="form-floating form-group mb-1 col-5" style="display: inline-block;">
                              <select class="form-select" id="UpClienteSelect" name="UpClienteSelect" 
                                aria-label="Floating label select example" required>
                                <option selected disabled value="">Cliente</option>
                              <?php
                                  if (mysqli_num_rows($cliente)) {
                                    while ($row3 = mysqli_fetch_array($cliente)) {
                                        echo "<option value=".$row3['clienteUn'].">{$row3['clienteUn']}</td>";
                                    }
                                } 
                              ?> 
                              </select>
                              <label for="UpClienteSelect">Cliente</label>
                          </div>

                          
                          <div class="form-floating form-group mb-1 col-5" style="display: inline-block;">
                              <select class="form-select" id="UpLocalSelect" name="UpLocalSelect" 
                                aria-label="Floating label select example" required>
                                <option selected disabled value="">Local</option>
                              <?php
                                  if (mysqli_num_rows($local)) {
                                    while ($row4 = mysqli_fetch_array($local)) {
                                        echo "<option value=".$row4['local'].">{$row4['local']}</td>";
                                    }
                                } 
                              ?> 
                              </select>
                              <label for="UpLocalSelect">Local</label>
                          </div>

                          <div class="form-floating form-group mb-1 col-5" style="display: inline-block;">
                              <select class="form-select" id="UpStatusSelect" name="UpStatusSelect" 
                                aria-label="Floating label select example" required>
                                <option selected disabled value="">Status</option>
                                          <?php
                                              if (mysqli_num_rows($status)) {
                                                while ($row5 = mysqli_fetch_array($status)) {
                                  
                                                    echo '<option value="'."{$row5['situacao']}".'"'.">{$row5['situacao']}</td>";
                                                }
                                            } 
                                          ?> 
                              </select>
                              <label for="UpStatusSelect">Status</label>
                          </div>
                          
                                                <!------ID DIV-------->
                                              <div class="form-floating form-group mb-3" style="display:none">
                                                  <input type="integer" class="form-control" name="UpIDId" id="UpIDId"
                                                      placeholder="Id" required>
                                                  <label for="UpIDId">id</label>
                                              </div>
                                               <!------ID DIV-------->
                                            <br>         
                                <button name ="Auditoria" onclick="send('Auditoria')" class="btn btn-primary w-100 m-2"  type="submit">Abrir Auditoria</button>
                          

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
    var IDId = document.getElementById('UpIDId');
    ConfirmIDId.value =  IDId.value;
});
        $('#ConfirmModal').modal('show');
    } 

    
  
    function closeUpdateModal(){
      //alert("teste");
        $('#updateModal').modal('hide');
} 


</script>


