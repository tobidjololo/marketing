<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <br>

        <li class="nav-item">
            <a class="nav-link collapsed" id="recherche" href="index.php">
            <i class="bi bi-person"></i>
            <span>Tableau de bord</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav1" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>Messages</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="#">
                    <i class="bi bi-circle"></i><span>Envoie unique</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                    <i class="bi bi-circle"></i><span>Envoie multiple</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav2" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>Mes contacts</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="showContacts.php">
                    <i class="bi bi-circle"></i><span>Voir mes contacts</span>
                    </a>
                </li>
                <li>
                    <a href="addContact.php">
                    <i class="bi bi-circle"></i><span>Enregistrez un contact</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav3" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>Nos packs</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav3" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="pack.php">
                    <i class="bi bi-circle"></i><span>Voir nos packs</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside><!-- End Sidebar-->
