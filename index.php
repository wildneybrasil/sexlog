<?php

$result = new Sexlog;
echo $result->get_email('b3rdcigpi4pv0gp@htmadv.rdb');


class Sexlog{

  //NUMEROS PRIMOS
  function get_prime_number(){

    $primos = 0;
    $numeros = 0;
    do {

      $aux = gmp_prob_prime($numeros);

      if($aux==2){
        $primos++;
      }

      $numeros++;

    } while ($primos <= 10001);

    return $numeros;
  }

  //FIBONACCI
  function get_sum_fibonacci(){

    $x = 0;
    $y = 1;
    $soma = $x + $y;

    for ($i=0; $i < 48 ; $i++) {
      $z = $x + $y;
      $soma += $z;

      $x = $y;
      $y = $z;

    }

    return $soma;
  }


  //DESCRIPTOGRAFAR E-MAIL
  function get_email($email){

    $chave = $this->get_prime_number() + $this->get_sum_fibonacci();
    $chave = strrev(substr($chave, 4, 2));

    $arrayAlfabeto = array(
      'a' => 1,
      'b' => 2,
      'c' => 3,
      'd' => 4,
      'e' => 5,
      'f' => 6,
      'g' => 7,
      'h' => 8,
      'i' => 9,
      'j' => 10,
      'k' => 11,
      'l' => 12,
      'm' => 13,
      'n' => 14,
      'o' => 15,
      'p' => 16,
      'q' => 17,
      'r' => 18,
      's' => 19,
      't' => 20,
      'u' => 21,
      'v' => 22,
      'w' => 23,
      'x' => 24,
      'y' => 25,
      'z' => 26,

    );

    $array_email = str_split($email);
    $email_descriptografado = "";

    foreach ($array_email as $key => $value) {
      if( ctype_alpha($value) ){

        if( array_key_exists($value, $arrayAlfabeto) ){

          if( $arrayAlfabeto[$value] > $chave ){

            $aux = $arrayAlfabeto[$value] - $chave;

          }else{

            $aux = ($arrayAlfabeto[$value] + 26) - $chave;

          }

          $email_descriptografado .= array_search($aux, $arrayAlfabeto);
        }

      }else{
        $email_descriptografado .= $value;
      }

    }

    return $email_descriptografado;
  }

}



?>
