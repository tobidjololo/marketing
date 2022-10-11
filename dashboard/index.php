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
          <h1>Tableau de bord</h1>
          <nav>
            <ol class="breadcrumb" >
              <li class="breadcrumb-item"><a style="color: rgb(0, 0, 0)" href="/home">Accueil</a></li>
              <li class="breadcrumb-item active" style="color: rgb(0, 0, 0)">Tableau de bord</li>
            </ol>
          </nav>
        </div>
        <section class="section dashboard">
          <div class="row">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-xxl-4 col-md-4">
                  <div class="card info-card sales-card" style="background-color: rgb(41, 160, 41)">

                    <div class="card-body">
                      <h5 class="card-title" style="color: rgb(255, 255, 255)">Messages envoyés</h5>

                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i style="color: rgb(180, 196, 44)" class="bi bi-bank"></i>
                        </div>
                        <div class="ps-3">
                          <h6 style="color: rgb(255, 255, 255)">
                            <?php   
                                $user = new User();
                                $nbr = $user->nbrMessages('Messages',Session::get('user')[0]["id"],'id_client');
                                echo($nbr[0]['nbr']); 
                            ?>
                            </h6>
                            <span style="color: rgb(255, 255, 255)" class="pt-1 fw-bold">
                            <?php   
                                echo($nbr[0]['nbr']); 
                            ?>
                            </span>
                          <span style="color: rgb(255, 255, 255)" class="pt-2 ps-1">
                            message(s)
                          </span>

                        </div>
                      </div>
                    </div>

                  </div>
                </div>

                <div class="col-xxl-4 col-md-4">
                  <div class="card info-card sales-card" style="background-color: blue">

                    <div class="card-body">
                      <h5 class="card-title" style="color: rgb(255, 255, 255)">Crédits disponibles</h5>

                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i style="color: rgb(180, 196, 44)" class="bi bi-bank"></i>
                        </div>
                        <div class="ps-3">
                          <h6 style="color: rgb(255, 255, 255)">
                            <?php
                              $nbr = $user->nbrPack('User',Session::get('user')[0]["id"],'id');
                              echo($nbr['credits_restants']); 
                            ?>
                          </h6>
                          <span style="color: rgb(255, 255, 255)" class="pt-1 fw-bold"><?php     echo($nbr['credits_restants']); ?></span>
                          <span style="color: rgb(255, 255, 255)" class="pt-2 ps-1">
                            restant(s)
                          </span>

                        </div>
                      </div>
                    </div>

                  </div>
                </div>

                <div class="col-xxl-4 col-md-4">
                  <div class="card info-card sales-card" style="background-color: orange">

                    <div class="card-body">
                      <h5 class="card-title" style="color: rgb(255, 255, 255)">Nombre de filleules</h5>

                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i style="color: rgb(180, 196, 44)" class="bi bi-bank"></i>
                        </div>
                        <div class="ps-3">
                            <h6 style="color: rgb(255, 255, 255)">
                            <?php   
                                $nbr1 = $user->nbrMessages('User',Session::get('user')[0]["code_parrainage"],'code_parrain');
                                echo($nbr1[0]['nbr']); 
                            ?>
                            </h6>
                            <span style="color: rgb(255, 255, 255)" class="pt-1 fw-bold">
                            <?php   
                                echo($nbr1[0]['nbr']); 
                            ?>
                            </span>
                          <span style="color: rgb(255, 255, 255)" class="pt-2 ps-1">
                          filleule(s)
                          </span>

                        </div>
                      </div>
                    </div>

                  </div>
                </div>

                <div class="col-12">
                    <div class="card recent-sales">
                        <div class="card-body">
                            <h5 class="card-title">Liste des derniéres messages envoyées</h5>
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