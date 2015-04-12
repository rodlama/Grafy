<?php

/**
 * Sloupcový graf
 * @author Adam Holejšovský
 * @license http://opensource.org/licenses/MIT MIT
 * @todo V případě zadání pouze nulových hodnot je graf nepřehledný.
 * @version 1.0.0
 */
class Graf {

    /**
     * Hodnoty jednotlivých sloupců
     * @var array 
     */
    private $hodnoty;
    
    /**
     * Počet sloupců k vykreslení
     * @var integer
     */
    private $pocet;
    
    /**
     * Nejvyšší zadaná hodnota
     * @var integer
     */
    private $max_hodnota;

    /**
     * Konstruktor
     * @param array $pole_hodnot Hodnoty zadané uživatelem
     */
    function __construct($pole_hodnot) {
        $hodnoty = explode(',', $pole_hodnot);
        foreach ($hodnoty as $key => $value) {
            $this->hodnoty[$key] = intval($value);
        }
        $this->max_hodnota = max($this->hodnoty);
        $this->pocet = count($this->hodnoty);
    }

    /**
     * Pomocná funkce pro vygenerování sloupců
     * @return string HTML kód
     */
    private function GenerujSloupce() {
        $sirka = floor(840 / $this->pocet);
        $vystup = '';
        foreach ($this->hodnoty as $value) {
            $vystup .= '<div class="sloupec" style="width: ' . $sirka . 'px; height: ' . floor($value / $this->max_hodnota * 420) . 'px; background: rgb(' . mt_rand(0, 255) . ',' . mt_rand(0, 255) . ',' . mt_rand(0, 255) . ');">' . $value . '</div>';
        }
        return $vystup;
    }
    
    /**
     * Magická metoda, která vypíše výstup
     * @return string HTML kód
     */
    function __toString() {
        $vystup = '';
        $vystup .= '<div id="grafy">';
        $vystup .= $this->GenerujSloupce();
        $vystup .= '</div>';
        return $vystup;
    }

}
