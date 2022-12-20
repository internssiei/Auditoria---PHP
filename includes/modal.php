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


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastrar Novo Projeto</h5>
        <button type="button" class="close" onclick="closeModal()" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form method="post">
                <div class="modal-body">      
                  <div class="bg-light rounded h-100 p-4">
                          <div class="form-floating form-group mb-3">
                                  <input type="text" class="form-control" name="ProjetoId" id="ProjetoId"
                                      placeholder="Projeto" required>
                                  <label for="ProjetoId">Projeto</label>
                          </div>

                          <div class="form-floating form-group mb-3">
                              <input type="text" class="form-control" id="AreaId" name="AreaId"
                                  placeholder="Área" required>
                              <label for="AreaId">Área</label>
                          </div>
<!-- 
                          <div class="form-floating form-group mb-3">
                              <select class="form-select" id="OperacaoSelect" name="OperacaoSelect" 
                                aria-label="Floating label select example" required>
                                 <option selected disabled value="">Selecione uma Operação</option> 
                              <?php
                                //   if (mysqli_num_rows($operacao)) {
                                //     while ($row = mysqli_fetch_array($operacao)) {
                                //         echo "<option value=".$row['operacao'].">{$row['operacao']}</td>";
                                //     }
                                // } 
                              ?> 
                              </select>
                              <label for="OperacaoSelect">Selecione uma Operação</label>
                          </div> -->
                          <div class="form-floating form-group mb-3">
                               <select class="form-select" id="OperacaoSelect" name="OperacaoSelect" 
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
                              
                              <!-- <input type="text" class="form-control" id="OperacaoSelect" name="OperacaoSelect"
                                  placeholder="Operação" required>
                               -->
                          
                              <label for="OperacaoSelect">Operação</label>
                          </div>


                          

                          <div class="form-floating form-group">
                              <textarea class="form-control" placeholder="Informe o título do projeto"
                                  id="TituloProjeto" name="TituloProjeto" style="height: 100px;" required></textarea >
                              <label for="TituloProjeto">Título</label>
                          </div>
                              <br>

                              <!-- -----------------SELECT SECTION----------------------- -->
                          <div class="form-floating form-group mb-1 col-4" style="display: inline-block;">
                              <select class="form-select" id="PlataformaSelect" name="PlataformaSelect" 
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
                              <label for="PlataformaSelect">Plataforma</label>
                          </div>

                          <div class="form-floating form-group mb-1 col-4" style="display: inline-block;">
                              <select class="form-select" id="ClienteSelect" name="ClienteSelect" 
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
                              <label for="ClienteSelect">Cliente</label>
                          </div>

                          
                          <div class="form-floating form-group mb-1 col-4" style="display: inline-block;">
                              <select class="form-select" id="LocalSelect" name="LocalSelect" 
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
                              <label for="LocalSelect">Local</label>
                          </div>

                          <div class="form-floating form-group mb-1 col-4" style="display: inline-block;">
                              <select class="form-select" id="StatusSelect" name="StatusSelect" 
                                aria-label="Floating label select example" required>
                                
                                <option selected disabled value="">Status</option>
                              <?php
                                  if (mysqli_num_rows($status)) {
                                    while ($row5 = mysqli_fetch_array($status)) {
                                        echo "<option value=".$row5['situacao'].">{$row5['situacao']}</td>";
                                    }
                                } 
                              ?> 
                              </select>
                              <label for="StatusSelect">Status</label>
                          </div>
                          
                          


                                  <!-- ----------------- END SELECT SECTION----------------------- -->
                  </div>
                </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                          </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
    function closeModal(){
        $('#exampleModal').modal('hide');
       
    }
</script>



