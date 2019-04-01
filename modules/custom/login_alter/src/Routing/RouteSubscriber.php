<?php
namespace Drupal\login_alter\Routing;
 
use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;
 

class RouteSubscriber extends RouteSubscriberBase {
 
  public function alterRoutes(RouteCollection $collection) {
    //Geting url from configuration form on which we have to open login form
    $config = \Drupal::config('login_alter.loginalterconfiguration');
    $data['login_url'] = $config->get('login_url');
    
    // Changing path '/user/login' to whatever in configuration form.
    if ($route = $collection->get('user.login')) {
      $route->setPath($data['login_url']);
    }
    
    //Access denied for logout page
    
    // if ($route = $collection->get('user.logout')) {
    //   $route->setRequirement('_access', 'FALSE');
    // }
  }
 
}