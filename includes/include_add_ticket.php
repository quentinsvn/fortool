<?php
if(isset($_POST['objet'], $_POST['priority'], $_POST['message'])) {
   if(!empty($_POST['objet']) AND !empty($_POST['priority']) AND !empty($_POST['message'])) {
      $ticket_id = rand(1000, 9999);
      $ticket_objet = htmlspecialchars($_POST['objet']);
      $ticket_priority = htmlspecialchars($_POST['priority']);
      $ticket_message = htmlspecialchars($_POST['message']);
      if($user['staff'] == 1) {
         $staff = 1;
       } else {
         $staff = 0;
       }
      $ins = $bdd->prepare("INSERT INTO tickets (id_ticket, date_creation,auteur, objet,priorite) VALUES (?, NOW(),?,?,?)");
      $ins->execute(array($ticket_id, $_SESSION['pseudo'], $ticket_objet, $ticket_priority));
      $ins2 = $bdd->prepare("INSERT INTO tickets_reponses (id_ticket, date, par, message,staff) VALUES (?, NOW(),?,?,?)");
      $ins2->execute(array($ticket_id, $_SESSION['pseudo'], $ticket_message,$staff));
      $message = '<div class="alert bg-success alert-icon-left alert-dismissible mb-2" role="alert">
         Votre ticket a bien été publiée !
     </div>';
     header('Location: index.php');
   } else {
      $message = '<div class="alert bg-danger alert-icon-left alert-dismissible mb-2" role="alert">
         Veuillez remplir tous les champs !
     </div>';
   }
}

?>