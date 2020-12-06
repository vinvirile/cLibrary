<?php
//cLibrary PHP initially started 12/3/2020 by Serra Jones(cagycee).
class cLibrary {
    public static $version = '0.1.2a';
    private $coninfo;
    private $cp;
    private $dp;
    public function sqlcon($h=null, $u=null, $p=null, $d=null, $c=null) {
        /* CONNECTS TO DATABASE USING PDO 
        *  EX: sqlcon(yourhost, youruser, yourpass, yourdatabase, yourcharset)
        *  Localhost: $var = $clvar->sqlcon(null, null, null, "DATABASE", null);
        */ 
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

    public function encrypt($str, $key, $iM=null, $i=null, $o=null) {
        /* ENCRYPTS ANY DATA USING OPENSSL
         * EX: $variable = $clname->encrypt('THISISASTRING', 'BLAHBLAHKEYTHIS');
         * NOTE: By changing the IV method and/or IV number, your encryption will become more secure! 
         * Reassure that you are using the same method, key, option, and iv for the counterpart function decrypt()!
         * FULL USE: $variable = $clvar->encrypt('THISISASTRING', 'BLAHBLAHKEYTHIS', 'aes-128-cbc', '6584692267521658', null);
         */
        $this->cp = Array(
            'method' => ($iM ? $iM : 'AES-128-CTR'),
            'iv' => ($i ? $i : '1234567891012345'),
            'option' => ($o ? $o : 0),
            'str' => $str,
            'key' => $key
        );
        if ($str===null) {
            throw new Exception('No string to encrypt');
        } else if ($key===null) {
            throw new Exception('Cannot encrypt '.$str. ' wihtout key');
        } else {
            return openssl_encrypt($this->cp['str'], $this->cp['method'], $this->cp['key'], $this->cp['option'], $this->cp['iv']);
        }
    }

    public function decrypt($enc, $key, $iM=null, $i=null, $o=null) {
        /* DECRYPTS a specific ENCRYPTION USING OPENSSL. REQUIRED TO KNOW ENCRYPTION's IV METHOD, IV #, OPTION, and KEY
         * EX: $variable = $clname->decrypt('THISISASTRING', 'BLAHBLAHKEYTHIS'); #ONLY IF YOU HAVEN'T PROVIDED the IV, 
         * Reassure that you are using the same method, key, option, and iv for the counterpart function encrypt()!
         * FULL USE: $variable = $clvar->decrypt('vmUqpYqnk66FoPwIllAbpg==', 'BLAHBLAHKEYTHIS', 'aes-128-cbc', '6584692267521658', null);
         */
        $this->dcp = Array(
            'method' => ($iM ? $iM : 'AES-128-CTR'), //iv method
            'iv' => ($i ? $i : '1234567891012345'), // iv #
            'option' => ($o ? $o : 0), //option
            'enc' => $enc, //encryption
            'key' => $key // key
        );
        if ($enc===null) {
            throw new Exception('No encryption to decrypt');
        } else if ($key===null) {
            throw new Exception('Cannot decrypt '.$enc. ' wihtout key');
        } else {
            return openssl_decrypt($this->dcp['enc'], $this->dcp['method'], $this->dcp['key'], $this->dcp['option'], $this->dcp['iv']);
        }
    }

}
?>