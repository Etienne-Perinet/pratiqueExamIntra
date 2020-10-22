<!-- Question 1-->
<?php
    echo('<script type="text/javascript" src="/'.PATH_PUBLIC.'\js\addEvaluationResult.js"></script>')
?>

<form action="/evaluation/addResult" class="needs-validation" method="post" novalidate >
  <div class="row">
    <div class="col-12 col-md-6">
      <div class="form-group">
        <label for="id_student">Étudiant</label>
        <div class="input-group">
          <select class="constom-select" id="id_student" name="id_student" placeholder="Choisir..." required>
            <option selected disabled value="">Choisir...</option>    
            <?php
                foreach($students as $student){
                  echo('<option value="'.$student->get_id().'"> '.$student->get_first_name().' '.$student->get_last_name().'</option>');
                } 
            ?>
            

          </select>
          <div class="invalid-feedback">
            Vous devez choisir un étudiant.
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="name">Nom de l'évaluation</label>
        <input class="form-control" id="name" name="name" placeholder="Le nom" required pattern=".{3,}">
        <div class=" invalid-feedback">
          Un nom doit être indiqué
        </div>
      </div>
      <div class="form-group">.
        <label for="score">Résultat</label>
        <input type="number" class="form-control" name="score" id="score" placeholder="Le résultat" min="1" max="100"
        required>
        <div class=" invalid-feedback">
          Le résultat doit être en 0 et 100.
        </div>
      </div>     
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Ajouter</button>
</form>

