#symfony-2-cookie-check
<b>Avertissement de l'utilisation des cookies</b>

<br />

Le but but de ce petit script est de créer un cookie unique, afin de contrôler son existence sur le poste client.
Si il est existant on le crée pas, le cas contraire on avertit le visiteur et on le crée...

<br />

<b>CookieCheckController.php</b>

```php
...

class CookieCheckController extends Controller
{
  public function indexAction()
  {
    ...
    
    if (isset($_COOKIE["site_cookie_check"])){
    $cookie = "";
    }
    else{
    $cookie = setcookie("site_cookie_check", "web-site.com", time() + 365*24*3600, "/", null, false, true); 
    }
    
    ...
    
    return $this->render("BUNDLESiteBundle:Page:index.html.twig", array("cookie" => $cookie,));
  }
}

...
```

<br />

Le bouton "btn btn-default" vient du template css Bootstrap 3.3.5


<br />

Exemple, si pas visité.. : <a href="http://acte-online.com" target="_blank">http://acte-online.com</a>
