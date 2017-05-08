<?php 
        session_start();
        $ime_prezime = $_POST['ime_prezime'];
        $subj_numb = $_POST['predmet'];
        echo $ime_prezime;
        echo "<p>Pretmet:</p>";
        echo "<form action='add_subjects.php' method='post'>";
        for($i = 0; $i<= $subj_numb; $i++) {
            echo "<input type='text' name'$i'><br/>";
            $name = array($i);
        }
        echo "<input type='submit' value='Kreiraj učenika'></form>";
        $_SESSION['name'] = $name;
        $_SESSION['ime_prezime'] = $ime_prezime;

    
?>