<?php
namespace Drupal\comuni_module;

class comuni_module
{
    public function bootstrap_italia_css()
    {
        header("Content-type: text/css", true);

        $o = file_get_contents(DRUPAL_ROOT."/modules/custom/design-comuni-drupal-theme/comuni_theme/node_modules/bootstrap-italia/dist/css/bootstrap-italia-comuni.min.css");
        
        $primary_h = "214";
        $primary_s = "59";
        $primary_b = "20";
        $primary_rgb = "21, 47, 82";

        $o = str_ireplace("--bs-primary: hsl(160deg, 100%, 24%)", "--bs-primary: hsl(".$primary_h."deg, ".$primary_s."%, ".$primary_b."%)", $o);//--bs-primary
        $o = str_ireplace("#007a52", "var(--bs-primary)", $o);//hex to --bs-primary
        $o = str_ireplace("--bs-link-hover-color: #006242", "--bs-link-hover-color: hsl(".$primary_h."deg, 100%, 19%)", $o);//--bs-link-hover-color
        $o = str_ireplace("--bs-primary-rgb: 0, 122, 82", "--bs-primary-rgb: ".$primary_rgb, $o);//--bs-primary-rgb
        $o = str_ireplace("--bs-link-color: hsl(160deg, 100%, 24%)", "--bs-link-hover-color: hsl(".$primary_h."deg, 100%, 24%)", $o);//--bs-link-color
        $o = str_ireplace("#00402B", "rgb(var(--bs-primary-rgb), var(--bs-bg-opacity))", $o);//header-slim-bg-color
        $o = str_ireplace("#202a2e", "rgb(var(--bs-primary-rgb), var(--bs-bg-opacity))", $o);//footer-bg-color
        $o = str_ireplace("#006342", "hsl(".$primary_h."deg, 100%, 19%)", $o);//button
        $o = str_ireplace("0,122,82", $primary_rgb, $o);//button shadow
        $o = str_ireplace("#005c3e", "hsl(".$primary_h."deg, 100%, 18%)", $o);//border+dropdown+bg

        print $o;
        exit;

        return array(
            '#markup' => $o
		);
    }
    
}