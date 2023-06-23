<?php

namespace Drupal\comuni_module\Plugin\views\style;

use Drupal\views\Plugin\views\style\StylePluginBase;

use Drupal\Core\Form\FormStateInterface;
/**
 * The style plugin for Accordion.
 *
 * @ingroup views_style_plugins
 *
 * @ViewsStyle(
 *   id = "accordion",
 *   title = @Translation("Accordion"),
 *   help = "",
 *   theme = "views_view_accordion",
 *   display_types = {"normal"}
 * )
 */
class Accordion extends StylePluginBase {

    /**
     * {@inheritdoc}
     */
    protected $usesRowPlugin = TRUE;
  
    /**
     * Does the style plugin support custom css class for the rows.
     *
     * @var bool
     */
    protected $usesRowClass = TRUE;
}
