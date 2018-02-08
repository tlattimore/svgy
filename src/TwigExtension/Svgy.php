<?php

namespace Drupal\svgy\TwigExtension;

class Svgy extends \Twig_Extension {

 /**
  * List the custom Twig fuctions.
  *
  * @return array
  */
  public function getFunctions() {
    return [
      new \Twig_SimpleFunction('icon', array($this, 'getInlineSvg')),
    ];
  }


  /**
   * Get the name of the service listed in svgy.services.yml
   *
   * @return string
   */
  public function getName() {
    return "svgy.twig.extension";
  }

  /**
   * Callback for the icon() Twig function.
   *
   * @return array
   */
  public static function getInlineSvg($name, $title) {
    return [
      '#type' => 'inline_template',
      '#template' => '<span class="icon__wrapper"><svg class="icon icon--{{ name }}" role="img" title="{{ title }}" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#{{ name }}"></use></svg></span>',
      '#context' => [
        'title' => $title,
        'name' => $name,
      ],
    ];
  }
}

