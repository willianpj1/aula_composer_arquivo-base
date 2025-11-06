<?php

namespace app\database;

use PDO;

class Connection
{
    #Variavel de conexão com banco de dados.
    private static $pdo = null;
    #Metodo de conexão com banco de dados.
    public static function connection(): PDO
    {
        try {

            if (static::$pdo) {
                return static::$pdo;
            }
            $option = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, #LANÇA EXCEÇÕES EM CASO DE ERROS.
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, #DEFINE O MODO DE FETCH PADRÇÃO COMO ARRY ASSOCIATIVO.
                PDO::ATTR_EMULATE_PREPARES => false, #DESATIVA A EMULAÇÃO DE PREPARED STATEMETS.
                PDO::ATTR_PERSISTENT => true, #CONEXÃO PERSISTENTE PARA MELHORAR A PERFOMACE.
                PDO::ATTR_STRINGIFY_FETCHES => false, #DESATIVA A CONVERSÃO DE VALORES NUMERICOS PARA STRINGS
            ];
            #cria conexão com banco de dados
            static::$pdo = new PDO(
                'pgsql:host=localhost;port=5432;dbname=senac',
                'senac',
                'senac',
                $option
            );
            
            static::$pdo->exec("SET NAMES'utf8'");
            #caso seja bem sucedida a conexão retornamos a variavel $pdo;
            return static::$pdo;

        } catch (\PDOException $e) {
            throw new \PDOException("Erro" . $e->getMessage(), 1);
        }
    }
}
