<?php
/*
 * Classe de traitement de données ultra simplifiée pour l'exemple.
 * L'intérêt devient réel sur une classe complexe.
 */
class data
{
    /*
     * Tableau de données
     */
    private $data = array();

    /*
     * Ajout de données au tableau
     * On spécifie l'argument $data avec le type "array"
     */
    public function set(array $data)
    {
        $this->data += $data;
    }

    /*
     * Récupération des données
     */
    public function get()
    {
        return $this->data;
    }

    /*
     * Filtrage des données.
     * On spécifie l'argument $func avec le type "callable"
     * Closure::bind() est une méthode de PHP 5.4
     */
    public function filter(callable $func)
    {
        return call_user_func(Closure::bind($func, $this, __CLASS__));
    }

}

/*
 * Nouvelle instance de la classe "data"
 */
$data = new data;

/*
 * On ajoute les données
 * La déclaration d'un tableau avec [] est possible depuis PHP 5.4
 */
$data->set([
    'Jonathan'  => 112, 
    'Alex'      => 156, 
    'Max'       => 56,  
    'Aurélie'   => 26,  
    'Camille'   => 225
]);

/*
 * On filtre les données avec la création d'une fonction anonyme
 * L'objet $this est passé par référence dans la fonction
 */
$data->filter(function() {
    foreach ($this->data as $name => $score) {
        if ($score < 100)
            unset($this->data[$name]);
    }
    arsort($this->data);
});

/*
 * On affiche les données filtrées
 */
print_r($data->get());
