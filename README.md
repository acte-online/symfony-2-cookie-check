#symfony-2-cookie-check
<b>Avertissement de l'utilisation des cookies</b>

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

<b>index.html.twig</b>
```html
...
//...bla bla bla

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

//...bla bla bla
...
```

Le bouton "btn btn-default" vient du template css Bootstrap 3.3.5

<b>style.css</b>
```css
...

.cookie-check-div{
	display:none;
	width:100%;
	padding:20px;
	position:fixed;
	left:0;
	top:0;
	color:#fff;
	background:#555;
	z-index:99999999999;
}

.cookie-check-div-txt{
	float:left;
	margin:auto auto auto auto;
	padding:5px;
}

.cookie-check-div-bt{
	float:right
}

...
```

<br />

Si le cookie n'est pas créé, effectivement, il va ce créer avant même l'avertissement...
Je reviendrai dessus quand j'aurais le temps.. Pour le créer aprés validation du client.. Pour l'instant ça reste comme ça..

<br />

Exemple, si pas visité.. : <a href="http://acte-online.com" target="_blank">http://acte-online.com</a>
