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

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Liste de mes contacts</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Accueil</a></li>
                <li class="breadcrumb-item">Mes contacts</li>
                <li class="breadcrumb-item active">Liste de mes contacts</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <a href="addContact.php" class="btn btn-block btn-primary float-right" style="margin-bottom: 5px;float: right">Ajouter un contact</a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Liste de mes contacts</h5>
                        <!-- Table with stripped rows -->
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prenom</th>
                                    <th scope="col">Telephone</th>
                                    <th scope="col">Date enregistrer</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                    $user = new User();
                                    $donnes = $user->selectAllByElement("id_client",Session::get("user")[0]['id'],"MesContacts");
                                    $a = 1;
                                    foreach($donnes as $element) {
                                ?>
                                <tr>
                                    <td><?php echo $a++ ?></td>
                                    <td><?php echo $element['nom'] ?></td>
                                    <td><?php echo  $element['prenom'] ?></td>
                                    <td><?php echo  $element['telephone'] ?></td>
                                    <td><?php echo  $element['dateEnregistrer'] ?></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main><!-- End #main -->

<?php
    include('partials/footer.php');
?>