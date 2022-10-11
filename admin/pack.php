<?php
    include('../class/session.php');
    include('../class/User.php');
	  if(Session::checkSession())
    {
        include('partials/header.php');    
        include('partials/sidebar.php');
    } else {
        header("Location: ../connexion.php");
    }
?>
    <main id="main" class="main" style="background-image: url('assets/img/news-5.jpga');background-size: cover;background-repeat: no-repeat;background-color:gre;">
        <div class="pagetitle">
          <h1>Liste des packs</h1>
          <nav>
            <ol class="breadcrumb" >
              <li class="breadcrumb-item"><a style="color: rgb(0, 0, 0)" href="/home">Accueil</a></li>
              <li class="breadcrumb-item active" style="color: rgb(0, 0, 0)">Packs</li>
            </ol>
          </nav>
        </div>
        <section class="section dashboard">
          <div class="row">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-12">
                    <div class="card recent-sales">
                        <div class="card-body">
                            <h5 class="card-title">Liste des packs</h5>
                            <table class="table datatable">
                                <thead>
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Désignation</th>
                                    <th scope="col">Montant</th>
                                    <th scope="col">Nombre crédits</th>
                                    <th scope="col">Durée maximun</th>
                                    <th scope="col" class="text-center" colspan="2">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $user = new User();
                                        $donnes = $user->selectAllByElement(1,1,"Pack");
                                        $a = 1;
                                        foreach($donnes as $element) {
                                    ?>
                                    <tr>
                                        <td><?php echo $a++ ?></td>
                                        <td><?php echo $element['libellé'] ?></td>
                                        <td><?php echo  $element['montant'] ?></td>
                                        <td><?php echo  substr($element['nb_credit'], 0,20) ?></td>
                                        <td><?php echo  $element['duree_max'] ?> Jours</td>
                                        <td><a href='modifierPack.php?id=<?php echo  $element['id'] ?>' class="btn btn-warning m-1">Modifier</a><a href="supprimerPack.php?id=<?php echo  $element['id'] ?>" class="btn btn-danger">Supprimer</a></td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- End Recent Sales -->
              </div>
            </div><!-- End Left side columns -->
        </section>
    </main>
<?php
    include('partials/footer.php');
?>