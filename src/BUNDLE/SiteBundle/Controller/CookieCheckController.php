<?php
namespace BUNDLE\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageSiteController extends Controller
{
  public function indexAction()
  {
    //On créé le cookie de check
    if (isset($_COOKIE['site_cookie_check'])){
    $cookie = "";
    }
    else{
    $cookie = setcookie('site_cookie_check', 'web-site.com', time() + 365*24*3600, '/', null, false, true); 
    }
    
    return $this->render('BUNDLESiteBundle:Page:index.html.twig', array('cookie' => $cookie,));
  }
}
