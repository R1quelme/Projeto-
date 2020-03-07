<?php
session_start(); 

if(!isset($_SESSION['user'])){ //se o usuario nao foi configurado, esse if passa a funcionar
    $_SESSION['user'] = "";
    $_SESSION['nome'] = "";
    $_SESSION['tipo'] = "";  //todas as paginas do front tem um "require_once" que verifica atraves desse codigo quando se é apertado o botao "Entrar" que esta na pagina "topo.php" se já ha alguem cadastrado
    $_SESSION["valida_estudonauta"] = "0";
}

function cripto($senha){
    $c = '';
    for($pos = 0; $pos < strlen($senha); $pos++) {
        $letra = ord($senha[$pos]) + 2;
        $c .= chr($letra);
    }
    return $c;
}

function gerarHash($senha){
    $txt = cripto($senha); 
    $hash = password_hash($txt, PASSWORD_DEFAULT);
    return $hash;
}

function testarHash($senha, $hash){
    $ok = password_verify(cripto($senha), $hash);
    return $ok;
}

function logout(){
    unset($_SESSION['user']);
    unset($_SESSION['nome']);
    unset($_SESSION['tipo']);
    unset($_SESSION['valida_estudonauta']);
}

function is_logado(){ //se estiver logado
    if(empty($_SESSION['user'])){
        return false;
    } else{
        return true;
    }
}

function is_admin(){
    $t = $_SESSION['tipo'] ?? null;
    if(is_null($t)){ //se a variavel t estiver nula, ou seja, se ele nem estiver logado, ele não é admin, então é falso    
        return false;
    } else {
        if ($t == 'admin'){
            return true;
        } else {
            return false;
        }
    }
}

function is_editor(){
    $t = $_SESSION['tipo'] ?? null;
    if(is_null($t)){
        return false;
    } else{
        if ($t == 'editor'){
            return true;
        } else {
            return false;
        }
    }
}
// $original = 'Riquelme';
// echo "$original --- "; 
// echo cripto($original) . " --- "; //Vai criptografar a senha original que no caso é Riquelme
// echo gerarHash($original) . " --- "; //Vai criptografar a criptografia da senha 



// if (testarHash('teste', '$2y$10$cp2O00BGapaqNBw2e.uqn.RW0dTfVFOrxyayY4m48TEllTlaCsEgW')){
//     echo "Senha confere";
// } else {
//     echo "Senha nao confere";
// }


//echo gerarHash('teste'); //gera uma reche com o atributo que foi colocado dentro do parenteses