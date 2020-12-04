<?php
//cLibrary initially started 12/3/2020 by Serra Jones(cagycee).
class cLibrary {
    public static $version = '0.1.0a';
    private $coninfo;
    public function sqlcon($h=null, $u=null, $p=null, $d=null, $c=null) {
        // CONNECTS TO DATABASE USING PDO
        $this->coninfo = Array(
            'host'=> ($h ? $h : '127.0.0.1'),
            'username' => ($u ? $u : 'root'),
            'password' => $p,
            'dbname' => $d,
            'char'=> ($c ? $c : 'utf8')
        );
        try {
            $pdo = new PDO('mysql:host='.$this->coninfo['host'].';dbname='.$this->coninfo['dbname'].';char='.$this->coninfo['char'].';', $this->coninfo['username'], $this->coninfo['password']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        } catch(PDOException $e) {
            echo 'Connection Failed: '. $e->getMessage();
        }
    }
}
?>