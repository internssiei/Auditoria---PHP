<?php
session_start();
if(!isset($_SESSION['user'])){
    header('Location: signin.php');
}else{
     $user = $_SESSION['user'];
    

}
require __DIR__.'\vendor\autoload.php';
include('conexao.php');
include('conexaoAzure.php');

include __DIR__.'\script\Cadastrar.php';
include __DIR__.'\script\Atualizar.php';
include __DIR__.'\script\Excluir.php';
include __DIR__.'\script\Filtrar.php';
include __DIR__.'\script\Router.php';


use App\Entity\Projeto;



?>


<!DOCTYPE html>
<html lang="en">

<?php
//  ---------------------- HEADER
include __DIR__.'/includes/header.php';
?>
<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">


<?php
//  ---------------------- SPINNER
include __DIR__.'/includes/spinner.php';
?>
        
<?php
//  ----------------------   SIDEBAR
include __DIR__.'/includes/sidebar.php';
?>

                                <!-- Content Start -->
                                <div class="content">            
<?php
//  ---------------------- NAVBAR
include __DIR__.'/includes/navbar.php';
?>





                                <!-- List Start -->
                                <div class="container-fluid pt-4 px-4">
                                    <div class="bg-light text-center rounded p-4">
                                        <div class="d-flex align-items-center justify-content-between mb-4">    
                                    <form method="get" class="d-none d-md-flex ms-3 mb-0">
                                        <input class="form-control border-0 " type="text" name="buscar" placeholder="Procurar Projeto" value="<?=$buscar?>">
                                        <button type="submit" name="procurar" class="btn btn-primary m-2" >Procurar</button>
                                    </form>
                                <button type="button" class="btn btn-primary g-4" onclick="openModal()" data-toggle="modal" data-target="#exampleModal" data-whatever="testestes">Cadastrar</button>
                                    
                                



<?php
//  -----------MODAIS-----------
include __DIR__.'/includes/modal.php';
include __DIR__.'/includes/modalUpdate.php';

             
?>                                          
                 
                                            
                            </div>
                                <div class="table-responsive">
<?php
//  ---------------------- TABELA
include __DIR__.'/includes/table.php';

?>
                                </div>
                            </div>
                        </div>
            
 

<!-- Footer Start -->
<?php
include __DIR__.'/includes/footer.php';

include __DIR__.'/includes/confirmarExclusao.php';
?>
<!-- Footer End -->

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





<script type="text/javascript">
    function openModal(){
        $('#exampleModal').modal('show');
    }   

</script>







</body>

</html>