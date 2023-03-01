<?php
 
 
    class API_FFTT
    {
 
        private function random_str($nbr) { // Génération sérial
            $str = "";
            $chaine = "ABCDEFGHIJKLMNOPQRSUTVWXYZ0123456789";
            $nb_chars = strlen($chaine);
            for($i=0; $i<$nbr; $i++)
            {
            $str .= $chaine[ rand(0, ($nb_chars-1)) ];
            }
            return $str;
        }
 
        
        public function initialisationAPI() { // Pour tests connexion
            $ID = "SW677";
            $cle = md5("tT9W7zQHw2");
            $serie = $this->random_str(15);
            $_SESSION["API"] = $serie ;
            $tm = round(microtime(true)*1000); // timestamp en ms
            $tmEntier = sprintf("%.0f", $tm); // pour ne pas avoir de notation scientifique
            $tmc = hash_hmac("sha1",$tmEntier,$cle); // timestamp codé
            $chaine = 'http://www.fftt.com/mobile/pxml/xml_initialisation.php?serie='.$serie.'&tm='.$tmEntier.'&tmc='.$tmc.'&id='.$ID;
            $result = file_get_contents($chaine);
 
            $dom = new DomDocument();
            $dom->loadXML($result);
            $reponse = $dom->getElementsByTagName('appli')->item(0)->nodeValue;
            return $reponse;
        }
 
        
        public function connexionAPI($api, $params = null){
            $ID = "SW677";
            $cle = md5("tT9W7zQHw2");
            $tm = round(microtime(true)*1000); // timestamp en ms
            $tmEntier = sprintf("%.0f", $tm); // pour ne pas avoir de notation scientifique
            $tmc = hash_hmac("sha1",$tmEntier,$cle); // timestamp codé
            $serie = $_SESSION["API"];
            $url = 'http://www.fftt.com/mobile/pxml/'.$api.'.php?serie='.$serie.'&tm='.$tmEntier.'&tmc='.$tmc.'&id='.$ID;
            
            if (!empty($params)) {
                $url .= '&' . http_build_query($params);
                }
            
            $result_xml = simplexml_load_string(file_get_contents($url));
            return json_decode(json_encode($result_xml), true);
        }
 
        
        public function getClubsByDepartement($departement){
 
                $extract = $this->connexionAPI('xml_club_dep2', array ('dep' => $departement));
                return $this->getCollection($extract['club']);
        }
 
        
        public function getClub($numero){
 
                $extract = $this->connexionAPI('xml_club_detail', array ('club' => $numero));
                return $this->getObject($extract['club']);
        }
 
 
        public function getOrganismes($type){
 
                if (!in_array($type, array('Z', 'L', 'D'))) {
                    $type = 'L';
                }
                $extract = $this->connexionAPI('xml_organisme', array ('type' => $type));
                return $this->getCollection($extract['organisme']);
        }
 
 
        public function getEpreuves($organisme, $type){
 
                if (!in_array($type, array('E', 'I'))) {
                $type = 'E';
                }
                
                $extract = $this->connexionAPI('xml_epreuve', array ('organisme' => $organisme, 'type' =>$type));
                return $this->getCollection($extract['epreuve']);
        }
 
 
        public function getDivisions($organisme, $epreuve, $type){   //ajout du type
 
                $extract = $this->connexionAPI('xml_division', array ('organisme' => $organisme, 'epreuve' => $epreuve, 'type' =>$type));
                return $this->getCollection($extract['division']);
        }
 
 
        public function getPoules($division, $poule = null) {
 
                $extract = $this->connexionAPI('xml_result_equ', array ('auto' => '1', 'D1' => $division, 'cx_poule' => $poule ,'action' => 'poule'));
                $poules = $this->getCollection($extract['poule']);
                
                foreach($poules as &$poule) {
                $params = array();
                parse_str($poule['lien'], $params);
                $poule['idpoule'] = $params['cx_poule'];
                $poule['iddiv'] = $params['D1'];
            }
            
            return $poules;
                
        }
        
 
        public function getPouleClassement($division, $poule = null) {
 
                $extract = $this->connexionAPI('xml_result_equ', array ('auto' => '1', 'D1' => $division, 'cx_poule' => $poule ,'action' => 'classement'));
                return $this->getCollection($extract['classement']);
 
        }
 
 
        public function getPouleRencontres($division, $poule = null) {
 
                $extract = $this->connexionAPI('xml_result_equ', array ('auto' => '1', 'D1' => $division, 'cx_poule' => $poule));
                return $this->getObject($extract['tour']);
 
        }
 
 
        public function getRencontre($link){
 
                $params = array();
                parse_str($link, $params);
                $extract = $this->connexionAPI('xml_chp_renc', $params);
                return $this->getObject($extract);
        }
 
 
        public function getEquipesByClub($club, $type = 'M'){
 
            if ($type && !in_array($type, array('M', 'F'))) {
            $type = 'M';
            }
 
            $extract =$this->connexionAPI('xml_equipe', array ('numclu' => $club, 'type' => $type));
            $teams = $this->getCollection($extract['equipe']);
                
            foreach($teams as &$team) {
                $params = array();
                parse_str($team['liendivision'], $params);
                $team['idpoule'] = $params['cx_poule'];
                $team['iddiv'] = $params['D1'];
            }
                return $teams;
        }
 
 
        public function getIndivResult($action, $epreuve, $division, $tableau = null ){ //NOUVEAU
 
            $action = (($action !='classement') OR ($action !='partie')) ? 'tour' : $action;
            $extract = $this->connexionAPI('xml_result_indiv', array ('epr' => $epreuve, 'res_division' => $division, 'cx_tableau' => $tableau));
            return $this->getObject($extract[$action]);
        }
 
        
        public function getIndivClassement($res_division){ //NOUVEAU
 
                $extract = $this->connexionAPI('xml_res_cla', array ('division' => $res_division));
                return $this->getObject($extract['classement']);
        }   
 
        
        public function getJoueursByName($nom , $prenom= ''){
 
                $extract = $this->connexionAPI('xml_liste_joueur', array ('nom' => strtoupper($nom), 'prenom' => ucfirst(strtolower($prenom))));
                return $this->getCollection($extract['joueur']);
        }
 
 
        public function getJoueursByClub($club){
 
                $extract = $this->connexionAPI('xml_liste_joueur', array ('club' => $club));
                return $this->getCollection($extract['joueur']);
        }
 
        
        public function getLicencesByClub($club){
 
                $extract = $this->connexionAPI('xml_liste_joueur_o', array ('club' => $club));
                return $this->getCollection($extract['joueur']);
        }
 
        
        public function getLicencesByName($nom, $prenom = ''){
 
                $extract = $this->connexionAPI('xml_liste_joueur_o', array ('nom' => strtoupper($nom), 'prenom' => ucfirst(strtolower($prenom))));
                return $this->getCollection($extract['joueur']);
        }
        
        
        public function getLicencesSpid($licence){  //NOUVEAU
 
                $extract = $this->connexionAPI('xml_liste_joueur_o', array ('licence' => $licence));
                return $this->getCollection($extract['joueur']);
        }       
        
        
        public function getJoueurLicence($licence){ //NOUVEAU
 
                $extract = $this->connexionAPI('xml_joueur', array ('licence' => $licence));
                $extract['joueur']['natio'] = empty($extract['joueur']['natio']) ? 'F' : $extract['joueur']['natio']; // Nationalité
                return $this->getObject($extract['joueur']);
        }
        
        
        public function getJoueur($licence) {
 
                $extract = $this->connexionAPI('xml_joueur', array ('licence' => $licence));
                $extract['joueur']['natio'] = empty($extract['joueur']['natio']) ? 'F' : $extract['joueur']['natio']; // Nationalité
                $extract['joueur']['photo'] = "http://www.fftt.com/espacelicencie/photolicencie/{$extract['joueur']['licence']}_.jpg"; //url photo
                $extract['joueur']['progmois'] = round($extract['joueur']['point'] - $extract['joueur']['apoint'], 2); // Progression mensuelle
                $extract['joueur']['progann'] = round($extract['joueur']['point'] - $extract['joueur']['valinit'], 2); // Progression annuelle
                return $this->getObject($extract['joueur']);
 
        }
 
        
        public function getLicence($licence){
 
                $extract = $this->connexionAPI('xml_licence', array ('licence' => $licence));
                return $this->getObject($extract['licence']);
        }
        
        
        public function getJoueurParties($licence){
 
                $extract = $this->connexionAPI('xml_partie_mysql', array ('licence' => $licence));
                return $this->getCollection($extract['partie']);
        }
 
        
        public function getJoueurPartiesSpid($licence){   //A TESTER ULTERIEUREMENT
 
                $extract = $this->connexionAPI('xml_partie', array ('numlic' => $licence));
                return $this->getCollection($extract['resultat']);
        }
 
        
        public function ActuFFTT(){ //NOUVEAU
 
                $extract = $this->connexionAPI('xml_new_actu');
                return $this->getObject($extract['news']);
        }
 
 
        public function JoueurHisto($licence){ //NOUVEAU
 
                $extract = $this->connexionAPI('xml_histo_classement', array ('numlic' => $licence));
                return $this->getCollection($extract['histo']);
        }
 
        
        public static function getCollection($data, $key = null){
            if (empty($data)) {
                return array();
            }
     
            if ($key) {
                if (!array_key_exists($key, $data)) {
                    return array();
                }
                $data = $data[$key];
            }
     
            return isset($data[0]) ? $data : array($data);
        }
    
    
        public static function getObject($data, $key = null){
            if ($key) {
                return @array_key_exists($key, $data) ? $data[$key] : null;
            } else {
                return empty($data) ? null : $data;
            }
        }
    
    
    }


    
 
?>