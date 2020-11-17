<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Editeur</title>
    <!-- Image Favicon -->
    <link rel="icon" type="image/png" href="../assets/images/news.png" />

    <!-- Bootstrap core CSS-->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Déconnexion</a>
          </div>
        </li>
      </ul>

      <a class="navbar-brand mr-1" href="ajouter-article.php">Editeur</a>

      

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="ajouter-article.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Tableau de bord</span>
          </a>
        </li>
        <hr>
        <li class="nav-item">
          <a class="nav-link" href="ajouter-article.php">
            <i class="fas fa-user-plus"></i>
            <span>Ajouter un article</span></a>
        </li>
        <hr>
        <li class="nav-item">
          <a class="nav-link" href="display-articles.php">
            <i class="fas fa-users"></i>
            <span>Tous les articles</span></a>
        </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Editeur</li>
          </ol>

          <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Ajouter un article</div>
        <div class="card-body">
          <form action="traiterArticle.php">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputTitre" name="titre" class="form-control" placeholder="Entrez son(ses) prénom(s)" required="required" autofocus="autofocus">
                <label for="inputTitre">Titre</label>
              </div>
            </div>
            <div class="form-group">
              <label for="inputContenu">Contenu</label>
              <textarea class="form-control" name="contenu" id="inputContenu" placeholder="Mettez le contenu de l'article" rows="3"></textarea>
            </div>
             
          
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="date" name="dateCreattion" id="inputDateDeCreate" class="form-control" placeholder="Entrez la date de création" required="required">
                    <label for="inputDateDeCreate">Date de création</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="date" name="dateModification" id="inputDateDeUpdate" class="form-control" placeholder="Entrez la date de modification" required="required">
                    <label for="inputDateDeUpdate">Date de modification</label>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="number" name="categorie" id="inputCategorie" class="form-control" placeholder="Entrez le numéro de la catégorie" required="required" autofocus="autofocus">
                <label for="inputCategorie">Numéro de la catégorie</label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Enregistrer</button>
          </form>
        </div>
      </div>
    </div>
          
          <!-- ./container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © 2020</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-danger" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="../assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin.min.js"></script>

  </body>

</html>
