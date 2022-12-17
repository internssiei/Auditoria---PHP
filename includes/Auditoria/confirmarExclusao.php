
<div class="modal fade" id="ConfirmModal" tabindex="-2" role="dialog" aria-labelledby="ConfirmexampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ConfirmexampleModalLabel">Confirmar Exclusão</h5>
        <button type="button" class="close" onclick="closeConfirmModal()" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form method="post">                                     <!------ID DIV-------->
                    <div class="form-floating form-group">
                        <input type="integer" class="form-control" name="ConfirmIDId" id="ConfirmIDId"
                            placeholder="Id" required>
                            <p>Você deseja excluir esse projeto?</p>
                        <label for="ConfirmIDId">id</label>
                    </div>

                    <div class="modal-footer">
                              <button type="submit" name ="Excluir" type="button" class="btn btn-danger" onclick="send('Excluir')">Sim</button>    
                              <button type="submit" name ="Negar" class="btn btn-success" onclick="send('')">Não</button>
                            </div>
                </form>
                  </div>
                </div>
                                                                <!------ID DIV-------->
                            
                      </div>
                    </div>
                  </div>
<script type="text/javascript">
    function closeConfirmModal(){
      //alert("teste");
        $('#ConfirmModal').modal('hide');
} 


</script>


