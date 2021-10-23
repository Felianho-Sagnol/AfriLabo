@extends('baseLabo')
    @section('titleHead')
        AfriLab|Salle de Préparation Mecanique
    @endsection
    @section('titlePage')
       
       <a class="navbar-brand" href="#">Préparation Mecanique</a> 
    @endsection
    @section('autre')
       rien
    @endsection
    @section('content')
        <?php
           if (empty($demandes)) {
               echo "la demades est vide";
           }
           else{
               ?>
            <div class="container">

               
               <?php
                foreach ($demandes as $demande) {
                                                
                    ?>
                        <div class="card text-center">
                            <div class="card-header">
                                <?php
                                    echo "<h2>Le Numero de la demande <em>".$demande->demande_id."</em></h2>";
                                    $path="http://127.0.0.1:8000/PmValidate/".$demande->demande_id
                                ?>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Demande pour la Préparation</h5>
                                <p class="card-text" style="height:1vh;">Cette demande contient <?php echo $demande->nombre_echantillons?> , Veuillez finir tout avant de cliquez sur TERMINEE</p>
                                <a href="<?= $path?>" class="btn btn-primary">Préparation Terminée!!!</a>
                            </div>
                            <div class="card-footer text-muted">
                                <?php
                                    echo "Date d'envoie ".$demande->created_at
                                ?>
                            </div>
                        </div>
                    <?php
                }
           }

        
        ?>
</div>
        <h2>Nous sommes dans la salle de preparation<h2>
    @endsection

