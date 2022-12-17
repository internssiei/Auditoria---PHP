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


<div class="modal fade" id="AuditoriaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AuditoriaModal">Cadastrar Relatório</h5>
        <button type="button" class="close" onclick="closeModal()" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form method="post">
                <div class="modal-body">      
                  <div class="bg-light rounded h-100 p-4">
                          <div class="form-floating form-group mb-3">
                                  <input type="text" class="form-control" name="EvidênciaId" id="EvidênciaId"
                                      placeholder="Evidência" required>
                                  <label for="EvidênciaId">Evidência</label>
                          </div>

                          <div class="form-floating form-group mb-3">
                              <input type="text" class="form-control" id="LocalizacaoId" name="LocalizacaoId"
                                  placeholder="Localização" required>
                              <label for="LocalizacaoId">Localização</label>
                          </div>

                          <div class="form-floating form-group mb-3">
                               <select class="form-select" id="DisciplinaSelect" name="DisciplinaSelect" 
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
                              
                              <!-- <input type="text" class="form-control" id="OperacaoSelect" name="OperacaoSelect"
                                  placeholder="Operação" required>
                               -->
                          
                              <label for="DisciplinaSelect">Disciplina</label>
                          </div>


                          

                          <div class="form-floating form-group">
                              <textarea class="form-control" placeholder="Informe o título do projeto"
                                  id="Descricao" name="Descricao" style="height: 100px;" required></textarea >
                              <label for="Descricao">Descrição</label>
                          </div>
                              
                          <br>
                              <!-- -----------------SELECT SECTION----------------------- -->
                          <div class="form-floating form-group mb-1 col-4" style="display: inline-block;">
                              <select class="form-select" id="SituacaoSelect" name="SituacaoSelect" 
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
                              <label for="SituacaoSelect">Situação</label>
                          </div>

                          <br>
                          <br>

                          
                          <div class="form-floating form-group">
                              <textarea class="form-control" placeholder="Informe o título do projeto"
                                  id="Resposta" name="Resposta" style="height: 100px;"></textarea >
                              <label for="Resposta">Resposta</label>
                          </div>
                       
                          
                          
                       


                                  <!-- ----------------- END SELECT SECTION----------------------- -->
                  </div>
                </div>
                          <div class="modal-footer">
                            <button type="submit" name="SalvarAudit" class="btn btn-primary">Salvar</button>
                          </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
    function closeModal(){
        $('#AuditoriaModal').modal('hide');
       
    }
</script>



