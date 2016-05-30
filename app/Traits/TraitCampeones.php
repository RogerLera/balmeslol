<?php

namespace App\Traits;

trait TraitCampeones {

    /**
     * Método que obtiene todos los campeones, en el idioma que se está visualizando la pàgina.
     *
     *
     * @return array associativo con la información de los campeones.
     */
    public function obtenerCampeones() {
        // Más adelante implementat sessión con idioma.
        //$idioma = Session::get('idioma');
        // Obtenemos el json.
        $json = file_get_contents('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/champion?locale=es_ES&champData=image,tags&api_key=a9a09074-95bd-4038-addb-a8b5e616e9c6');
        // Lo transformamos a objetos que php pueda entender.
        $data = json_decode($json);
        // Creamos el array que almazenará los campeones.
        $campeones = array();
        // En la variable campeones vamos introduciendo cada campeón.
        foreach ($data->data as $infoCampeon) {
            $campeones[] = array(
                'nombre' => $infoCampeon->name,
                'id' => $infoCampeon->id,
                'titulo' => $infoCampeon->title,
                'imagen' => 'http://ddragon.leagueoflegends.com/cdn/' . $data->version . '/img/champion/' . $infoCampeon->image->full,
                'tags' => $infoCampeon->tags,
            );
        }
        // Ordenamos el array por nombre.
        asort($campeones);
        // Devolvemos el array.
        return $campeones;
    }

    public function obtenerHabilidadesCampeon($id)
    {
        $json = file_get_contents('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/champion/' . $id . '?locale=es_ES&champData=spells,passive&api_key=a9a09074-95bd-4038-addb-a8b5e616e9c6');
        // Lo transformamos a objetos que php pueda entender.
        $infoCampeon = json_decode($json);
        $habilidades = ['Pasiva', 'Q', 'W', 'E', 'R'];
        $campeon;
        $campeon[$habilidades[0]]['nombre'] = $infoCampeon->passive->name;
        $campeon[$habilidades[0]]['imagen'] = 'http://ddragon.leagueoflegends.com/cdn/' . $this->version() . '/img/passive/' . $infoCampeon->passive->image->full;
        $n = 1;
        foreach ($infoCampeon->spells as $spell) {
            $campeon[$habilidades[$n]]['nombre'] = $spell->name;
            $campeon[$habilidades[$n]]['imagen'] = 'http://ddragon.leagueoflegends.com/cdn/' . $this->version() . '/img/spell/' . $spell->image->full;
			$n++;
        }
        return $campeon;
    }

}
