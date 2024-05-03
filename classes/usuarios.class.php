<?php

class Usuarios
{

    public function login()
    {
        if ($_POST) {
            if (!$_POST['login'] or !$_POST['senha']) {
                echo json_encode(['ERRO' => 'Falta informacoes!']);
                exit;
            } else {

                $login = addslashes(htmlspecialchars($_POST['login'])) ?? '';
                $senha = addslashes(htmlspecialchars($_POST['senha'])) ?? '';
                $secretJWT = $GLOBALS['secretJWT'];

                $db = DB::connect();
                $rs = $db->prepare("SELECT * FROM usuarios WHERE login = '{$login}'");
                $exec = $rs->execute();
                $obj = $rs->fetchObject();
                $rows = $rs->rowCount();

                if ($rows > 0) {
                    $idDB          = $obj->id;
                    $nameDB        = $obj->nome;
                    $passDB        = $obj->senha;
                    $validUsername = true;
                    $validPassword = password_verify($senha, $passDB) ? true : false;
                } else {
                    $validUsername = false;
                    $validPassword = false;
                }

                if ($validUsername and $validPassword) {
                    //$nextWeek = time() + (7 * 24 * 60 * 60);
                    $expire_in = time() + 60000;
                    $token     = JWT::encode([
                        'id'         => $idDB,
                        'name'       => $nameDB,
                        'expires_in' => $expire_in,
                    ], $GLOBALS['secretJWT']);

                    $db->query("UPDATE usuarios SET token = '$token' WHERE id = $idDB");
                    echo json_encode(['token' => $token, 'data' => JWT::decode($token, $secretJWT)]);
                } else {
                    if (!$validPassword) {
                        echo json_encode(['ERROR', 'invalid password']);
                    }
                }
            }
        } else {
            echo json_encode(['ERRO' => 'Falta informacoes!']);
            exit;
        }
    }

    public static function verificar()
    {
        
        $headers = apache_request_headers();
        if (isset($headers['authorization'])) {
            $token = str_replace("Bearer ", "", $headers['authorization']);
        } else if (isset($headers['Authorization'])) { //Nesse método conseguimos efetuar as requisições via Insominia/Postman devido ao Authorization
            $token = str_replace("Bearer ", "", $headers['Authorization']);
        } else {
            echo json_encode(['ERRO' => 'Você não está logado, ou seu token é inválido.']);
            exit;
        }

        $db   = DB::connect();
        $rs   = $db->prepare("SELECT * FROM usuarios WHERE token = '{$token}'");
        $exec = $rs->execute();
        $obj  = $rs->fetchObject();
        $rows = $rs->rowCount();
        $secretJWT = $GLOBALS['secretJWT'];

        if ($rows > 0) :
            $idDB    = $obj->id;
            $tokenDB = $obj->token;

            $decodedJWT = JWT::decode($tokenDB, $secretJWT);
            if ($decodedJWT->expires_in > time()) {
                return true;
            } else {
                $db->query("UPDATE usuarios SET token = '' WHERE id = $idDB");
                return false;
            }
        else :
            return false;
        endif;
    }

    public function cadastrar()
    {
        if ($_POST) {
            if (!$_POST['login'] or !$_POST['senha']) {
                echo json_encode(['ERRO' => 'Falta informações!']);
                exit;
            } else {
                $login = addslashes(htmlspecialchars($_POST['login'])) ?? '';
                $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Criptografa a senha antes de salvar no banco
    
                // Verifica se o login já está em uso
                $db = DB::connect();
                $checkUserQuery = $db->prepare("SELECT id FROM usuarios WHERE login = :login");
                $checkUserQuery->execute([':login' => $login]);
                $existingUser = $checkUserQuery->fetch(PDO::FETCH_ASSOC);
    
                if ($existingUser) {
                    echo json_encode(['ERRO' => 'Este login já está em uso. Por favor, escolha outro.']);
                    exit;
                }
    
                // Insere o usuário no banco de dados
                $insertUserQuery = $db->prepare("INSERT INTO usuarios (login, senha) VALUES (:login, :senha)");
                $exec = $insertUserQuery->execute([':login' => $login, ':senha' => $senha]);
    
                if ($exec) {
                    // Após inserir o usuário com sucesso, gere o token
                    $idDB = $db->lastInsertId(); // Obtém o ID do usuário recém-cadastrado
                    $expire_in = time() + 60000;
                    $token = JWT::encode([
                        'id' => $idDB,
                        'name' => $login,
                        'expires_in' => $expire_in,
                    ], $GLOBALS['secretJWT']);
                    $db->query("UPDATE usuarios SET token = '$token' WHERE id = $idDB");
    
                    echo json_encode(['mensagem' => 'Usuário cadastrado com sucesso!', 'token' => $token]);
                } else {
                    echo json_encode(['ERRO' => 'Erro ao cadastrar usuário.']);
                }
            }
        } else {
            echo json_encode(['ERRO' => 'Falta informações!']);
            exit;
        }
    }
}