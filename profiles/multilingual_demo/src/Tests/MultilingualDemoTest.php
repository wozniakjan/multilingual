<?php

/**
 * @file
 * Contains automated tests for the multilingual demo.
 */

namespace Drupal\multilingual_demo\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * Tests for the multilingual demo features.
 *
 * @group multilingual_demo
 */
class MultilingualDemoTest extends WebTestBase {

  protected $profile = 'multilingual_demo';

  /**
   * Test for the login.
   */
  public function testMultilingualDemoLogin() {
    // Create a user to check the login
    $user = $this->createUser();
    // Log in our user.
    $this->drupalLogin($user);

    // Verify that logged in user can access the logout link.
    $this->drupalGet('user');
    $this->assertLinkByHref('/user/logout');
  }

  /**
   * Test for the menu tabs.
   */
  public function testMultilingualDemoMenu() {
    // Verify that menu is translated.
    $this->drupalGet('');
    $this->assertText('Home');
    $this->assertText('Trips');
    $this->assertText('About Us');
    $this->assertText('Contact');

    $this->drupalGet('es');
    $this->assertText('Inicio');
    $this->assertText('Trips');
    $this->assertText('Sobre Nosotros');
    $this->assertText('Contactar');

    $this->drupalGet('fr');
    $this->assertText('Accueil');
    $this->assertText('Trips');
    $this->assertText('À Propos de Nous');
    $this->assertText('Contacter');

    $this->drupalGet('hu');
    $this->assertText('Címlap');
    $this->assertText('Trips');
    $this->assertText('Rólunk');
    $this->assertText('Kapcsolat');
  }

}
