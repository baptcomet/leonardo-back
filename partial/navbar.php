<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="dashboard.php">JacaDanse - Administration</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
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
    </div>
</nav>