<?php
session_start();

// inicijalizacija varijabli

$email    = "";
$errors = array(); 

// konkcija sa database
$db = mysqli_connect('localhost', 'root', '', 'registracija');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // primiti sve vrijednosti inputa iz forme
  
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $surname= mysqli_real_escape_string($db, $_POST['surname']);
  $nickname = mysqli_real_escape_string($db, $_POST['nickname']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $tel = mysqli_real_escape_string($db, $_POST['tel']);
  
 
 
  if (empty($email)) { array_push($errors, "Email je obavezan"); }
  if (empty($password_1)) { array_push($errors, "Šifra je obavezna"); }
  if (empty($name)) { array_push($errors, "Ime je obavezn"); }
  if (empty($surname)) { array_push($errors, "Prezime je obavezno"); }
 
  if (empty($address)) { array_push($errors, "Adresa je obavezna"); }
  
  if ($password_1 != $password_2) {
	array_push($errors, "Šifre se ne podudaraju");
  }

 
  $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // ako korisnik postoji
   

    if ($user['email'] === $email) {
      array_push($errors, "Email već postoji");
    }
  }

  // Registruj korisnika ako nema greške u formi
  if (count($errors) == 0) {
  	$password = md5($password_1);//enkripcija šifre

  	$query = "INSERT INTO users (name, surname, nickname, address, email, password, tel) 
  			  VALUES('$name', '$surname', '$nickname', '$address', '$email', '$password', '$tel')";
  	mysqli_query($db, $query);
  	$_SESSION['email'] = $email;
  	$_SESSION['success'] = "Već si logovan";
  	header('location: index.php');
  }
}
// LOGIN USER
if (isset($_POST['login_user'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($email)) {
        array_push($errors, "Email is je obavezan");
    }
    if (empty($password)) {
        array_push($errors, "Šifra je obavezna");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['email'] = $email;
          $_SESSION['success'] = "Sada si logovan";
          header('location: index.php');
        }else {
            array_push($errors, "Pogrešna kombinacija emaila i šifre");
        }
    }
  }
  
?>