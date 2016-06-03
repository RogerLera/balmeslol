<?php

namespace App\Traits;

include(app_path() . "\Graficos\class\pData.class.php");
include(app_path() . "\Graficos\class\pDraw.class.php");
include(app_path() . "\Graficos\class\pImage.class.php");

/**
* Clase TraitGraficos que genera los graficos que luego se mostraran en la vista
* de las estdísticas.
*/
trait TraitGraficos {

    /**
     * Método para generar una imagen del grafico de popularidad de campeones,
     * generando a partir de las estadísticas.
     *
     * @param type $estadisticas array con las estadísticas de popularidad de los campeones
     */
    public function generaGraficoPopularidadCampeones($estadisticas) {
        //info
        $valores = array();
        $nombres = array();
        foreach ($estadisticas as $estadistica) {
            array_push($valores, $estadistica['porciento']);
            array_push($nombres, $estadistica['nombre']);
        }
        $myData = new \pData();
        $myData->addPoints($valores, "Porciento");
        $myData->setSerieDescription("Porciento", "Porciento");
        $myData->setSerieOnAxis("Porciento", 0);
        $myData->addPoints($nombres, "Nombres");
        $myData->setAbscissa("Nombres");

        $myData->setAxisPosition(0, AXIS_POSITION_LEFT);
        $myData->setAxisName(0, "%");
        $myData->setAxisUnit(0, "");

        //visual
        $myPicture = new \pImage(700, 300, $myData);
        $Settings = array("R" => 60, "G" => 118, "B" => 255, "Dash" => 1, "DashR" => 80, "DashG" => 138, "DashB" => 203);
        $myPicture->drawFilledRectangle(0, 0, 700, 300, $Settings);

        $Settings = array("StartR" => 255, "StartG" => 255, "StartB" => 255, "EndR" => 0, "EndG" => 32, "EndB" => 138, "Alpha" => 50);
        $myPicture->drawGradientArea(0, 0, 700, 300, DIRECTION_VERTICAL, $Settings);

        $myPicture->drawRectangle(0, 0, 699, 299, array("R" => 0, "G" => 0, "B" => 0));

        $myPicture->setShadow(TRUE, array("X" => 1, "Y" => 1, "R" => 50, "G" => 50, "B" => 50, "Alpha" => 20));

        //titulo
        $myPicture->setFontProperties(array("FontName" => app_path() . "\Graficos/fonts/verdana.ttf", "FontSize" => 14));
        $TextSettings = array("Align" => TEXT_ALIGN_MIDDLEMIDDLE
            , "R" => 255, "G" => 255, "B" => 255);
        //$myPicture->drawText(350, 25, "Popularidad de los Campeones (en %)", $TextSettings);

        $myPicture->setShadow(TRUE);
        $myPicture->setGraphArea(50, 50, 675, 250);
        $myPicture->setFontProperties(array("R" => 0, "G" => 0, "B" => 0, "FontName" => app_path() . "\Graficos/fonts/verdana.ttf", "FontSize" => 8));

        $Settings = array("Pos" => SCALE_POS_LEFTRIGHT
            , "Mode" => SCALE_MODE_FLOATING
            , "LabelingMethod" => LABELING_ALL
            , "GridR" => 255, "GridG" => 255, "GridB" => 255, "GridAlpha" => 50, "TickR" => 0, "TickG" => 0, "TickB" => 0, "TickAlpha" => 50, "LabelRotation" => 0, "CycleBackground" => 1, "DrawXLines" => 1, "DrawSubTicks" => 1, "SubTickR" => 255, "SubTickG" => 0, "SubTickB" => 0, "SubTickAlpha" => 50, "DrawYLines" => ALL);
        $myPicture->drawScale($Settings);

        $myPicture->setShadow(TRUE, array("X" => 1, "Y" => 1, "R" => 50, "G" => 50, "B" => 50, "Alpha" => 10));

        //barras
        $Palette = array("0" => array("R" => 188, "G" => 224, "B" => 46, "Alpha" => 100),
            "1" => array("R" => 224, "G" => 100, "B" => 46, "Alpha" => 100),
            "2" => array("R" => 224, "G" => 214, "B" => 46, "Alpha" => 100),
            "3" => array("R" => 46, "G" => 151, "B" => 224, "Alpha" => 100),
            "4" => array("R" => 176, "G" => 46, "B" => 224, "Alpha" => 100),
            "5" => array("R" => 224, "G" => 46, "B" => 117, "Alpha" => 100),
            "6" => array("R" => 92, "G" => 224, "B" => 46, "Alpha" => 100),
            "7" => array("R" => 224, "G" => 176, "B" => 46, "Alpha" => 100));

        $Config = array("OverrideColors" => $Palette, "DisplayValues" => TRUE, "Gradient" => 3, "AroundZero" => 0);
        $myPicture->drawBarChart($Config);

        $myPicture->render(public_path() . "/images/graficos/popularidad_campeones.png");
    }

    /**
     * Método para generar una imagen del grafico de bloqueo de campeones,
     * generando a partir de las estadísticas.
     *
     * @param type $estadisticas array con las estadísticas de bloqueo de los campeones
     */
    public function generaGraficoBloqueoCampeones($estadisticas) {
        //info
        $valores = array();
        $nombres = array();
        foreach ($estadisticas as $estadistica) {
            array_push($valores, $estadistica['porciento']);
            array_push($nombres, $estadistica['nombre']);
        }
        $myData = new \pData();
        $myData->addPoints($valores, "Porciento");
        $myData->setSerieDescription("Porciento", "Porciento");
        $myData->setSerieOnAxis("Porciento", 0);
        $myData->addPoints($nombres, "Nombres");
        $myData->setAbscissa("Nombres");

        $myData->setAxisPosition(0, AXIS_POSITION_LEFT);
        $myData->setAxisName(0, "%");
        $myData->setAxisUnit(0, "");

        //visual
        $myPicture = new \pImage(700, 300, $myData);
        $Settings = array("R" => 60, "G" => 118, "B" => 255, "Dash" => 1, "DashR" => 80, "DashG" => 138, "DashB" => 203);
        $myPicture->drawFilledRectangle(0, 0, 700, 300, $Settings);

        $Settings = array("StartR" => 255, "StartG" => 255, "StartB" => 255, "EndR" => 0, "EndG" => 32, "EndB" => 138, "Alpha" => 50);
        $myPicture->drawGradientArea(0, 0, 700, 300, DIRECTION_VERTICAL, $Settings);

        $myPicture->drawRectangle(0, 0, 699, 299, array("R" => 0, "G" => 0, "B" => 0));

        $myPicture->setShadow(TRUE, array("X" => 1, "Y" => 1, "R" => 50, "G" => 50, "B" => 50, "Alpha" => 20));

        //titulo
        $myPicture->setFontProperties(array("FontName" => app_path() . "\Graficos/fonts/verdana.ttf", "FontSize" => 14));
        $TextSettings = array("Align" => TEXT_ALIGN_MIDDLEMIDDLE
            , "R" => 255, "G" => 255, "B" => 255);
        //$myPicture->drawText(350, 25, "Bloqueo de los Campeones (en %)", $TextSettings);

        $myPicture->setShadow(TRUE);
        $myPicture->setGraphArea(50, 50, 675, 250);
        $myPicture->setFontProperties(array("R" => 0, "G" => 0, "B" => 0, "FontName" => app_path() . "\Graficos/fonts/verdana.ttf", "FontSize" => 8));

        $Settings = array("Pos" => SCALE_POS_LEFTRIGHT
            , "Mode" => SCALE_MODE_FLOATING
            , "LabelingMethod" => LABELING_ALL
            , "GridR" => 255, "GridG" => 255, "GridB" => 255, "GridAlpha" => 50, "TickR" => 0, "TickG" => 0, "TickB" => 0, "TickAlpha" => 50, "LabelRotation" => 0, "CycleBackground" => 1, "DrawXLines" => 1, "DrawSubTicks" => 1, "SubTickR" => 255, "SubTickG" => 0, "SubTickB" => 0, "SubTickAlpha" => 50, "DrawYLines" => ALL);
        $myPicture->drawScale($Settings);

        $myPicture->setShadow(TRUE, array("X" => 1, "Y" => 1, "R" => 50, "G" => 50, "B" => 50, "Alpha" => 10));

        //barras
        $Palette = array("0" => array("R" => 188, "G" => 224, "B" => 46, "Alpha" => 100),
            "1" => array("R" => 224, "G" => 100, "B" => 46, "Alpha" => 100),
            "2" => array("R" => 224, "G" => 214, "B" => 46, "Alpha" => 100),
            "3" => array("R" => 46, "G" => 151, "B" => 224, "Alpha" => 100),
            "4" => array("R" => 176, "G" => 46, "B" => 224, "Alpha" => 100),
            "5" => array("R" => 224, "G" => 46, "B" => 117, "Alpha" => 100),
            "6" => array("R" => 92, "G" => 224, "B" => 46, "Alpha" => 100),
            "7" => array("R" => 224, "G" => 176, "B" => 46, "Alpha" => 100));

        $Config = array("OverrideColors" => $Palette, "DisplayValues" => TRUE, "Gradient" => 3, "AroundZero" => 0);
        $myPicture->drawBarChart($Config);

        $myPicture->render(public_path() . "/images/graficos/bloqueo_campeones.png");
    }

    /**
     * Método para generar una imagen del grafico de popularidad de hechizos,
     * generando a partir de las estadísticas.
     *
     * @param type $estadisticas array con las estadísticas de popularidad de los hechizos
     */
    public function generaGraficoPopularidadHechizos($estadisticas) {
        //info
        $valores = array();
        $nombres = array();
        foreach ($estadisticas as $estadistica) {
            array_push($valores, $estadistica['porciento']);
            array_push($nombres, $estadistica['nombre']);
        }
        $myData = new \pData();
        $myData->addPoints($valores, "Porciento");
        $myData->setSerieDescription("Porciento", "Porciento");
        $myData->setSerieOnAxis("Porciento", 0);
        $myData->addPoints($nombres, "Nombres");
        $myData->setAbscissa("Nombres");

        $myData->setAxisPosition(0, AXIS_POSITION_LEFT);
        $myData->setAxisName(0, "%");
        $myData->setAxisUnit(0, "");

        //visual
        $myPicture = new \pImage(700, 300, $myData);
        $Settings = array("R" => 60, "G" => 118, "B" => 255, "Dash" => 1, "DashR" => 80, "DashG" => 138, "DashB" => 203);
        $myPicture->drawFilledRectangle(0, 0, 700, 300, $Settings);

        $Settings = array("StartR" => 255, "StartG" => 255, "StartB" => 255, "EndR" => 0, "EndG" => 32, "EndB" => 138, "Alpha" => 50);
        $myPicture->drawGradientArea(0, 0, 700, 300, DIRECTION_VERTICAL, $Settings);

        $myPicture->drawRectangle(0, 0, 699, 299, array("R" => 0, "G" => 0, "B" => 0));

        $myPicture->setShadow(TRUE, array("X" => 1, "Y" => 1, "R" => 50, "G" => 50, "B" => 50, "Alpha" => 20));

        //titulo
        $myPicture->setFontProperties(array("FontName" => app_path() . "\Graficos/fonts/verdana.ttf", "FontSize" => 14));
        $TextSettings = array("Align" => TEXT_ALIGN_MIDDLEMIDDLE
            , "R" => 255, "G" => 255, "B" => 255);
        //$myPicture->drawText(350, 25, "Popularidad de los Hechizos (en %)", $TextSettings);

        $myPicture->setShadow(TRUE);
        $myPicture->setGraphArea(50, 50, 675, 250);
        $myPicture->setFontProperties(array("R" => 0, "G" => 0, "B" => 0, "FontName" => app_path() . "\Graficos/fonts/verdana.ttf", "FontSize" => 8));

        $Settings = array("Pos" => SCALE_POS_LEFTRIGHT
            , "Mode" => SCALE_MODE_FLOATING
            , "LabelingMethod" => LABELING_ALL
            , "GridR" => 255, "GridG" => 255, "GridB" => 255, "GridAlpha" => 50, "TickR" => 0, "TickG" => 0, "TickB" => 0, "TickAlpha" => 50, "LabelRotation" => 0, "CycleBackground" => 1, "DrawXLines" => 1, "DrawSubTicks" => 1, "SubTickR" => 255, "SubTickG" => 0, "SubTickB" => 0, "SubTickAlpha" => 50, "DrawYLines" => ALL);
        $myPicture->drawScale($Settings);

        $myPicture->setShadow(TRUE, array("X" => 1, "Y" => 1, "R" => 50, "G" => 50, "B" => 50, "Alpha" => 10));

        //barras
        $Palette = array("0" => array("R" => 188, "G" => 224, "B" => 46, "Alpha" => 100),
            "1" => array("R" => 224, "G" => 100, "B" => 46, "Alpha" => 100),
            "2" => array("R" => 224, "G" => 214, "B" => 46, "Alpha" => 100),
            "3" => array("R" => 46, "G" => 151, "B" => 224, "Alpha" => 100),
            "4" => array("R" => 176, "G" => 46, "B" => 224, "Alpha" => 100),
            "5" => array("R" => 224, "G" => 46, "B" => 117, "Alpha" => 100),
            "6" => array("R" => 92, "G" => 224, "B" => 46, "Alpha" => 100),
            "7" => array("R" => 224, "G" => 176, "B" => 46, "Alpha" => 100));

        $Config = array("OverrideColors" => $Palette, "DisplayValues" => TRUE, "Gradient" => 3, "AroundZero" => 0);
        $myPicture->drawBarChart($Config);

        /* en teoria así se pueden poner imágenes, pero no funciona inexplicablemente.
        foreach ($estadisticas as $estadistica) {
            $myPicture->drawFromPNG(100, 100,$estadistica['imagen']);
        }
         */

        $myPicture->render(public_path() . "/images/graficos/popularidad_hechizos.png");
    }

}
