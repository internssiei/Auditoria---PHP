<?php
/**
 * 
 * INICIANDO SESSÃO
 * 
 */
session_start();
if(!isset($_SESSION['user'])){
    header('Location: signin.php');
}else{
     $user = $_SESSION['user'];
}
require __DIR__.'/vendor/autoload.php';
include('conexao.php');


/**
 * 
 * CARREGANDO SCRIPT CADASTRAR
 * 
 */
include __DIR__.'/script/auditoria_script/Cadastrar.php';
include __DIR__.'/script/auditoria_script/Atualizar.php';
include __DIR__.'/script/auditoria_script/Excluir.php';
include __DIR__.'/script/auditoria_script/Filtrar.php';

/**
 * 
 * REFERÊNCIANDO O USO DA CLASSE AUDITORIA PARA A PÁGINA
 * 
 */
use \App\Entity\Auditoria;
?>

<!DOCTYPE html>
<html lang="en">

<?php
/**
 * 
 * CARREGANDO HEADER
 * 
 */
include __DIR__.'/includes/header.php';

?>
<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
<?php

/**
 * 
 * CARREGANDO SPINNER
 * 
 */
include __DIR__.'/includes/spinner.php';
?>

<?php
include __DIR__.'/includes/sidebar.php';
?>

        <!-- Content Start -->
        <div class="content">
<?php

include __DIR__.'/includes/navbar.php';
?>
<style>
#formControlStatus, #formControlDisciplina, #filtroForm {
    display: block;
    width: 50%;
    padding: 0rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #757575;
    background-color: #fff0;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    appearance: none;
    border-radius: 5px;
    transition: border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out;
}


#FilterDisciplinaSelect, #FilterStatusSelect{
    display: block;
    width: 100%;
    padding: 0.375rem 2.25rem -2.625rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #757575;
    background-color: #fff;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 0.75rem center;
    background-size: 16px 12px;
    border: 1px solid #ced4da;
    border-radius: 5px;
    appearance: none;
}

</style>
<!-- /**
 * 
 * FORMATANDO FILTROS END
 * 
 */ -->

              <!-- List Start -->
                                <div class="container-fluid pt-4 px-4">
                                    <div class="bg-light text-center rounded p-4">
                                        <div class="d-flex align-items-center justify-content-between mb-4">

                                         <!-- Form filtro Start -->
                                        <form method="get" id="filtroForm" class="form-control d-none d-md-flex ms-1 mb-0">
                                            <input type="integer" style="display:none" class="form-control" name="projeto_id" id="projeto_id"
                                                placeholder="Id" value="<?=$_GET['projeto_id']?>">
                                                <div class="form-floating" id="formControlDisciplina">
                                                    <select class="form-select form-control border-0" id="FilterDisciplinaSelect" name="disciplina"
                                                        aria-label="Floating label select example" >
                                                        <option selected disabled value="">Selecione  </option>
                                                                <?php
                                                                    if (mysqli_num_rows($querydisciplina)) {
                                                                        while ($row = mysqli_fetch_array($querydisciplina)) {
                                                                            echo "<option value=".$row['disciplina'].">{$row['disciplina']}</td>";
                                                                        }
                                                                    }
                                                                ?>
                                                    </select>
                                                    <label for="disciplina">Disciplina</label>
                                                </div>

                                            <div class="form-floating" id="formControlStatus">
                                                <select class="form-select form-control border-0" id="FilterStatusSelect" name="status"
                                                    aria-label="Floating label select example" >
                                                            <option selected disabled value="">Selecione  </option>
                                                                    <?php
                                                                        if (mysqli_num_rows($queryStatus)) {
                                                                            while ($row = mysqli_fetch_array($queryStatus)) {
                                                                                echo "<option value=".$row['situacao'].">{$row['situacao']}</td>";
                                                                            }
                                                                        }
                                                                    ?>
                                                        </select>
                                                    <label for="FilterStatusSelect">Status</label>
                                            </div>
                                            <button type="submit" class="btn btn-primary m-2" style="left: 5px;">Filtrar</button>
                                        </form>
                                        <!-- Form filtro END -->
                                    <button type="button" class="btn btn-primary g-4" onclick="openModal()" data-toggle="modal" data-target="#exampleModal" data-whatever="testestes">Cadastrar</button>



<?php

/**
 * 
 * CARREGANDO MODAIS DE CADASTRO E ATUALIZAÇÃO
 * 
 */
include __DIR__.'/includes/Auditoria/modal.php';
include __DIR__.'/includes/Auditoria/modalUpdate.php';                                                                     
?>
</div> 
                    <!--/**
                        * 
                        * INICIANDO CARREGAMENTO DA TABELA RESPONSIVA
                        * 
                        */ -->
                    <div class="table-responsive">
                        <?php
                         /**
                         * 
                         * CARREGANDO TABELA
                         * 
                         */ 
                        include __DIR__.'/includes/Auditoria/table.php';
                        ?>
                    </div>
                </div>
            </div>
<!-- Footer Start -->
<?php
 /**
                         * 
                         * CARREGANDO FOOTER
                         * 
                         */ 
include __DIR__.'/includes/footer.php';

 /**
                         * 
                         * CARREGANDO MODAL EXCLUSÃO
                         * 
                         */ 
include __DIR__.'/includes/Auditoria/confirmarExclusao.php';
?>

</div>
<!-- Content End -->


<!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>


    <!-- Template Javascript -->
    <script src="js/main.js"></script>




<!-- func abrir modal para cadastro Javascript -->
<script type="text/javascript">
    function openModal(){
        $('#AuditoriaModal').modal('show');
    }

</script>







</body>

</html>

