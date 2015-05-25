<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li<?php echo $activePage == 'dashboard' ? ' class="active"' : ''?>>
            <a href="dashboard.php">Tableau de Bord</a>
        </li>
        <li<?php echo $activePage == 'actualites' ? ' class="active"' : ''?>>
            <a href="actualites.php">Actualités</a>
        </li>
        <li<?php echo $activePage == 'cours' ? ' class="active"' : ''?>>
            <a href="cours.php">Cours</a>
        </li>
        <li<?php echo $activePage == 'planning' ? ' class="active"' : ''?>>
            <a href="planning.php">Planning</a>
        </li>
        <li<?php echo $activePage == 'professeurs' ? ' class="active"' : ''?>>
            <a href="professeurs.php">Professeurs</a>
        </li>
        <li<?php echo $activePage == 'photos' ? ' class="active"' : ''?>>
            <a href="photos.php">Photos</a>
        </li>
        <li<?php echo $activePage == 'presse' ? ' class="active"' : ''?>>
            <a href="presse.php">Presse</a>
        </li>
    </ul>
</div>