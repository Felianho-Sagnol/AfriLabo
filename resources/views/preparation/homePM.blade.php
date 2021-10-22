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
                foreach ($demandes as $demande) {
                                                
                    ?>
                        <div class="card text-center">
                            <div class="card-header">
                                <?php
                                    echo $demande->demande_id
                                ?>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Valider la Demande</a>
                            </div>
                            <div class="card-footer text-muted">
                                <?php
                                    echo $demande->created_at
                                ?>
                            </div>
                        </div>
                    <?php
                }
           }

        
        ?>

        <h2>Nous sommes dans la salle de preparation<h2>
    @endsection

