<?php

namespace Drupal\comuni_module\Plugin\views\style;

use Drupal\views\Plugin\views\style\StylePluginBase;

use Drupal\Core\Form\FormStateInterface;
/**
 * The style plugin for Card Container.
 *
 * @ingroup views_style_plugins
 *
 * @ViewsStyle(
 *   id = "card_container",
 *   title = @Translation("Card Container"),
 *   help = "",
 *   theme = "views_view_card_container",
 *   display_types = {"normal"}
 * )
 */
class CardContainer extends StylePluginBase {

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

  /**
   * {@inheritdoc}
   */
    protected function defineOptions() {
        $options = parent::defineOptions();
        $options['columns'] = ['default' => '3'];
        return $options;
    }


  /**
   * {@inheritdoc}
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);
    $form['columns'] = [
      '#type' => 'number',
      '#title' => $this->t('Number of columns'),
      '#default_value' => $this->options['columns'],
      '#required' => TRUE,
      '#min' => 1,
    ];
  }
  
}
