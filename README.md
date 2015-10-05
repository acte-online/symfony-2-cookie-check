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
    //...bla bla bla
    
    if (isset($_COOKIE["site_cookie_check"])){
    $cookie = "";
    }
    else{
    $cookie = setcookie("site_cookie_check", "web-site.com", time() + 365*24*3600, "/", null, false, true); 
    }
    
    //...bla bla bla
    
    return $this->render("BUNDLESiteBundle:Page:index.html.twig", array("cookie" => $cookie,));
  }
}

...
```

<br />

<b>index.html.twig</b>
<br />
Ici c'est avec Twig mais c'est faisable également en php...

```html
...

{% if app.request.cookies.get('site_cookie_check') %}
		
{% else %}
	<div id="cookie-div" class="cookie-check-div">
		<div class="cookie-check-div-txt">
			En poursuivant votre navigation sur ce site, vous acceptez l’utilisation de cookie.
		</div>
		<div class="cookie-check-div-bt">
			<a id="cookie-check-bt" class="btn btn-default" href="#" role="button">Ok</a>
		</div>
	</div>
{% endif %}

...
```

Le bouton "btn btn-default" vient du template css Bootstrap 3.3.5

<br />

Exemple, si pas visité.. : <a href="http://acte-online.com" target="_blank">http://acte-online.com</a>
