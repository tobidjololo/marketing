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
          <h1>Liste des messages</h1>
          <nav>
            <ol class="breadcrumb" >
              <li class="breadcrumb-item"><a style="color: rgb(0, 0, 0)" href="/home">Accueil</a></li>
              <li class="breadcrumb-item active" style="color: rgb(0, 0, 0)">Messages envoyés</li>
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
                            <h5 class="card-title">Liste des derniers messages envoyés</h5>
                            <table class="table datatable">
                                <thead>
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Recepteur</th>
                                    <th scope="col">Expéditeur</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Date Envoyée</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $user = new User();
                                        $donnes = $user->selectAllByElement("id_client",Session::get("user")[0]['id'],"Messages");
                                        $a = 1;
                                        foreach($donnes as $element) {
                                    ?>
                                    <tr>
                                        <td><?php echo $a++ ?></td>
                                        <td><?php echo $element['recepteur'] ?></td>
                                        <td><?php echo  $element['expediteur'] ?></td>
                                        <td><?php echo  substr($element['contenu'], 0,20) ?></td>
                                        <td><?php echo  $element['dateEnvoie'] ?></td>
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