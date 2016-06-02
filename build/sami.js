
(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href=".html">[Global Namespace]</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:pBarcode128" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="pBarcode128.html">pBarcode128</a>                    </div>                </li>                            <li data-name="class:pBarcode39" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="pBarcode39.html">pBarcode39</a>                    </div>                </li>                            <li data-name="class:pBubble" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="pBubble.html">pBubble</a>                    </div>                </li>                            <li data-name="class:pCache" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="pCache.html">pCache</a>                    </div>                </li>                            <li data-name="class:pData" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="pData.html">pData</a>                    </div>                </li>                            <li data-name="class:pDraw" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="pDraw.html">pDraw</a>                    </div>                </li>                            <li data-name="class:pImage" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="pImage.html">pImage</a>                    </div>                </li>                            <li data-name="class:pIndicator" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="pIndicator.html">pIndicator</a>                    </div>                </li>                            <li data-name="class:pPie" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="pPie.html">pPie</a>                    </div>                </li>                            <li data-name="class:pRadar" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="pRadar.html">pRadar</a>                    </div>                </li>                            <li data-name="class:pScatter" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="pScatter.html">pScatter</a>                    </div>                </li>                            <li data-name="class:pSplit" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="pSplit.html">pSplit</a>                    </div>                </li>                            <li data-name="class:pSpring" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="pSpring.html">pSpring</a>                    </div>                </li>                            <li data-name="class:pStock" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="pStock.html">pStock</a>                    </div>                </li>                            <li data-name="class:pSurface" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="pSurface.html">pSurface</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App.html">App</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:App_Console" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Console.html">Console</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:App_Console_Commands" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Console/Commands.html">Commands</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Console_Commands_Inspire" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Console/Commands/Inspire.html">Inspire</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:App_Console_Kernel" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Console/Kernel.html">Kernel</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Events" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Events.html">Events</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Events_Event" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Events/Event.html">Event</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Exceptions" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Exceptions.html">Exceptions</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Exceptions_Handler" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Exceptions/Handler.html">Handler</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Http" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Http.html">Http</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:App_Http_Controllers" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Http/Controllers.html">Controllers</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:App_Http_Controllers_Auth" >                    <div style="padding-left:54px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Http/Controllers/Auth.html">Auth</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Http_Controllers_Auth_AuthController" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="App/Http/Controllers/Auth/AuthController.html">AuthController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_Auth_PasswordController" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="App/Http/Controllers/Auth/PasswordController.html">PasswordController</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:App_Http_Controllers_CampeonController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/CampeonController.html">CampeonController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_Controller" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/Controller.html">Controller</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_EstadisticasController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/EstadisticasController.html">EstadisticasController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_FavoritoController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/FavoritoController.html">FavoritoController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_GuiaController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/GuiaController.html">GuiaController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_HechizoController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/HechizoController.html">HechizoController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_HomeController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/HomeController.html">HomeController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_InvocadorController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/InvocadorController.html">InvocadorController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_LanguageController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/LanguageController.html">LanguageController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_MensajeController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/MensajeController.html">MensajeController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_ObjetoController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/ObjetoController.html">ObjetoController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_UserController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/UserController.html">UserController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_VotacionController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/VotacionController.html">VotacionController</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Http_Middleware" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Http/Middleware.html">Middleware</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Http_Middleware_Authenticate" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Middleware/Authenticate.html">Authenticate</a>                    </div>                </li>                            <li data-name="class:App_Http_Middleware_EncryptCookies" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Middleware/EncryptCookies.html">EncryptCookies</a>                    </div>                </li>                            <li data-name="class:App_Http_Middleware_Language" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Middleware/Language.html">Language</a>                    </div>                </li>                            <li data-name="class:App_Http_Middleware_RedirectIfAuthenticated" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Middleware/RedirectIfAuthenticated.html">RedirectIfAuthenticated</a>                    </div>                </li>                            <li data-name="class:App_Http_Middleware_VerifyCsrfToken" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Middleware/VerifyCsrfToken.html">VerifyCsrfToken</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Http_Requests" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Http/Requests.html">Requests</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Http_Requests_Request" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Requests/Request.html">Request</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:App_Http_Kernel" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Http/Kernel.html">Kernel</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Jobs" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Jobs.html">Jobs</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Jobs_Job" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Jobs/Job.html">Job</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Policies" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Policies.html">Policies</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Policies_UserPolicy" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Policies/UserPolicy.html">UserPolicy</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Providers" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Providers.html">Providers</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Providers_AppServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Providers/AppServiceProvider.html">AppServiceProvider</a>                    </div>                </li>                            <li data-name="class:App_Providers_AuthServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Providers/AuthServiceProvider.html">AuthServiceProvider</a>                    </div>                </li>                            <li data-name="class:App_Providers_EventServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Providers/EventServiceProvider.html">EventServiceProvider</a>                    </div>                </li>                            <li data-name="class:App_Providers_RouteServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Providers/RouteServiceProvider.html">RouteServiceProvider</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Repositories" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Repositories.html">Repositories</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Repositories_GuiaRepository" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Repositories/GuiaRepository.html">GuiaRepository</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Traits" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Traits.html">Traits</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Traits_TraitCampeones" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Traits/TraitCampeones.html">TraitCampeones</a>                    </div>                </li>                            <li data-name="class:App_Traits_TraitGraficos" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Traits/TraitGraficos.html">TraitGraficos</a>                    </div>                </li>                            <li data-name="class:App_Traits_TraitHechizos" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Traits/TraitHechizos.html">TraitHechizos</a>                    </div>                </li>                            <li data-name="class:App_Traits_TraitObjetos" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Traits/TraitObjetos.html">TraitObjetos</a>                    </div>                </li>                            <li data-name="class:App_Traits_TraitRunas" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Traits/TraitRunas.html">TraitRunas</a>                    </div>                </li>                            <li data-name="class:App_Traits_TraitVersionActual" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Traits/TraitVersionActual.html">TraitVersionActual</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:App_EstadisticasCampeon" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/EstadisticasCampeon.html">EstadisticasCampeon</a>                    </div>                </li>                            <li data-name="class:App_EstadisticasHechizo" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/EstadisticasHechizo.html">EstadisticasHechizo</a>                    </div>                </li>                            <li data-name="class:App_Favorito" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/Favorito.html">Favorito</a>                    </div>                </li>                            <li data-name="class:App_Guia" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/Guia.html">Guia</a>                    </div>                </li>                            <li data-name="class:App_Role" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/Role.html">Role</a>                    </div>                </li>                            <li data-name="class:App_User" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/User.html">User</a>                    </div>                </li>                            <li data-name="class:App_Votacion" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/Votacion.html">Votacion</a>                    </div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": ".html", "name": "", "doc": "Namespace "},{"type": "Namespace", "link": "App.html", "name": "App", "doc": "Namespace App"},{"type": "Namespace", "link": "App/Console.html", "name": "App\\Console", "doc": "Namespace App\\Console"},{"type": "Namespace", "link": "App/Console/Commands.html", "name": "App\\Console\\Commands", "doc": "Namespace App\\Console\\Commands"},{"type": "Namespace", "link": "App/Events.html", "name": "App\\Events", "doc": "Namespace App\\Events"},{"type": "Namespace", "link": "App/Exceptions.html", "name": "App\\Exceptions", "doc": "Namespace App\\Exceptions"},{"type": "Namespace", "link": "App/Http.html", "name": "App\\Http", "doc": "Namespace App\\Http"},{"type": "Namespace", "link": "App/Http/Controllers.html", "name": "App\\Http\\Controllers", "doc": "Namespace App\\Http\\Controllers"},{"type": "Namespace", "link": "App/Http/Controllers/Auth.html", "name": "App\\Http\\Controllers\\Auth", "doc": "Namespace App\\Http\\Controllers\\Auth"},{"type": "Namespace", "link": "App/Http/Middleware.html", "name": "App\\Http\\Middleware", "doc": "Namespace App\\Http\\Middleware"},{"type": "Namespace", "link": "App/Http/Requests.html", "name": "App\\Http\\Requests", "doc": "Namespace App\\Http\\Requests"},{"type": "Namespace", "link": "App/Jobs.html", "name": "App\\Jobs", "doc": "Namespace App\\Jobs"},{"type": "Namespace", "link": "App/Policies.html", "name": "App\\Policies", "doc": "Namespace App\\Policies"},{"type": "Namespace", "link": "App/Providers.html", "name": "App\\Providers", "doc": "Namespace App\\Providers"},{"type": "Namespace", "link": "App/Repositories.html", "name": "App\\Repositories", "doc": "Namespace App\\Repositories"},{"type": "Namespace", "link": "App/Traits.html", "name": "App\\Traits", "doc": "Namespace App\\Traits"},
            
            {"type": "Class", "fromName": "App\\Console\\Commands", "fromLink": "App/Console/Commands.html", "link": "App/Console/Commands/Inspire.html", "name": "App\\Console\\Commands\\Inspire", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Console\\Commands\\Inspire", "fromLink": "App/Console/Commands/Inspire.html", "link": "App/Console/Commands/Inspire.html#method_handle", "name": "App\\Console\\Commands\\Inspire::handle", "doc": "&quot;Execute the console command.&quot;"},
            
            {"type": "Class", "fromName": "App\\Console", "fromLink": "App/Console.html", "link": "App/Console/Kernel.html", "name": "App\\Console\\Kernel", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/EstadisticasCampeon.html", "name": "App\\EstadisticasCampeon", "doc": "&quot;Objeto EstadisticasCampeon el qual tiene como atributos &#039;escUsado&#039; (visualizar\nel total de veces que un campe\u00f3n a sido usado) i &#039;escBloqueado&#039; (visualizar el\ntotal de veces que un campe\u00f3n a sido bloqueado).&quot;"},
                    
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/EstadisticasHechizo.html", "name": "App\\EstadisticasHechizo", "doc": "&quot;Objeto EstadisticasHechizo el qual tiene como atributo &#039;eshUsado&#039; (visualizar\nel total de veces que un hechizo a sido seleccionado).&quot;"},
                    
            {"type": "Class", "fromName": "App\\Events", "fromLink": "App/Events.html", "link": "App/Events/Event.html", "name": "App\\Events\\Event", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Exceptions", "fromLink": "App/Exceptions.html", "link": "App/Exceptions/Handler.html", "name": "App\\Exceptions\\Handler", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Exceptions\\Handler", "fromLink": "App/Exceptions/Handler.html", "link": "App/Exceptions/Handler.html#method_report", "name": "App\\Exceptions\\Handler::report", "doc": "&quot;Report or log an exception.&quot;"},
                    {"type": "Method", "fromName": "App\\Exceptions\\Handler", "fromLink": "App/Exceptions/Handler.html", "link": "App/Exceptions/Handler.html#method_render", "name": "App\\Exceptions\\Handler::render", "doc": "&quot;Render an exception into an HTTP response.&quot;"},
            
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/Favorito.html", "name": "App\\Favorito", "doc": "&quot;Classe Favorito en la que se almazenan las guias que a un usuario le han gustado.&quot;"},
                    
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/Guia.html", "name": "App\\Guia", "doc": "&quot;Classe Guia alamzena un manual creado por un usuario sobre como jugar\ncon X campe\u00f3n.&quot;"},
                                                        {"type": "Method", "fromName": "App\\Guia", "fromLink": "App/Guia.html", "link": "App/Guia.html#method_user", "name": "App\\Guia::user", "doc": "&quot;Obtenemos el usuario que a creado la guia.&quot;"},
                    {"type": "Method", "fromName": "App\\Guia", "fromLink": "App/Guia.html", "link": "App/Guia.html#method_votacions", "name": "App\\Guia::votacions", "doc": "&quot;Obtenemos las votaciones que tiene la guia.&quot;"},
                    {"type": "Method", "fromName": "App\\Guia", "fromLink": "App/Guia.html", "link": "App/Guia.html#method_role", "name": "App\\Guia::role", "doc": "&quot;Obtenemos el rol al que hace referencia la guia.&quot;"},
                    {"type": "Method", "fromName": "App\\Guia", "fromLink": "App/Guia.html", "link": "App/Guia.html#method_favorito", "name": "App\\Guia::favorito", "doc": "&quot;Obtenemos si la guia es favorita.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers\\Auth", "fromLink": "App/Http/Controllers/Auth.html", "link": "App/Http/Controllers/Auth/AuthController.html", "name": "App\\Http\\Controllers\\Auth\\AuthController", "doc": "&quot;Controlador que maneja el registro de nuevos usuarios, como tambi\u00e9n la\nautenticaci\u00f3n de los usuarios existentes.&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\Auth\\AuthController", "fromLink": "App/Http/Controllers/Auth/AuthController.html", "link": "App/Http/Controllers/Auth/AuthController.html#method___construct", "name": "App\\Http\\Controllers\\Auth\\AuthController::__construct", "doc": "&quot;Creamos una nueva instancia del controlador autenticaci\u00f3n.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers\\Auth", "fromLink": "App/Http/Controllers/Auth.html", "link": "App/Http/Controllers/Auth/PasswordController.html", "name": "App\\Http\\Controllers\\Auth\\PasswordController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\Auth\\PasswordController", "fromLink": "App/Http/Controllers/Auth/PasswordController.html", "link": "App/Http/Controllers/Auth/PasswordController.html#method___construct", "name": "App\\Http\\Controllers\\Auth\\PasswordController::__construct", "doc": "&quot;Create a new password controller instance.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/CampeonController.html", "name": "App\\Http\\Controllers\\CampeonController", "doc": "&quot;Clase CampeonController que llama la vista para mostrar los datos referente a los\ncampeones, obteniendo la informaci\u00f3n de la API Riot en formato .json.&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\CampeonController", "fromLink": "App/Http/Controllers/CampeonController.html", "link": "App/Http/Controllers/CampeonController.html#method_index", "name": "App\\Http\\Controllers\\CampeonController::index", "doc": "&quot;M\u00e9todo principal que se llama al acceder a la pestanya campeones.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\CampeonController", "fromLink": "App/Http/Controllers/CampeonController.html", "link": "App/Http/Controllers/CampeonController.html#method_mostrarCampeon", "name": "App\\Http\\Controllers\\CampeonController::mostrarCampeon", "doc": "&quot;M\u00e9todo que devuelve a la vista la informaci\u00f3n sobre el campe\u00f3n seleccionado.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\CampeonController", "fromLink": "App/Http/Controllers/CampeonController.html", "link": "App/Http/Controllers/CampeonController.html#method_mostrarCampeonesGratuitos", "name": "App\\Http\\Controllers\\CampeonController::mostrarCampeonesGratuitos", "doc": "&quot;M\u00e9todo que devuelve a la vista los campeones gratuitos de la semana.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\CampeonController", "fromLink": "App/Http/Controllers/CampeonController.html", "link": "App/Http/Controllers/CampeonController.html#method_obtenerCampeonPorId", "name": "App\\Http\\Controllers\\CampeonController::obtenerCampeonPorId", "doc": "&quot;M\u00e9todo que a partir de una id, obtiene el campe\u00f3n deseado.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\CampeonController", "fromLink": "App/Http/Controllers/CampeonController.html", "link": "App/Http/Controllers/CampeonController.html#method_obtenerCampeonesGratis", "name": "App\\Http\\Controllers\\CampeonController::obtenerCampeonesGratis", "doc": "&quot;M\u00e9todo para obtener los campeones gratuitos de la semana.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/Controller.html", "name": "App\\Http\\Controllers\\Controller", "doc": "&quot;Clase Controller por defecto de Laravel&quot;"},
                    
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/EstadisticasController.html", "name": "App\\Http\\Controllers\\EstadisticasController", "doc": "&quot;Clase EstadisticasController que guardara datos de las partidas contenidas en\nlos ficheros seed_data, estos ficheros contienen datos de 1000 partidas de\ntipo ranked son ficheros de tipo json, para luego hacer las estadisticas.&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\EstadisticasController", "fromLink": "App/Http/Controllers/EstadisticasController.html", "link": "App/Http/Controllers/EstadisticasController.html#method_generaEstadisticas", "name": "App\\Http\\Controllers\\EstadisticasController::generaEstadisticas", "doc": "&quot;M\u00e8todo para guardar las estad\u00edsticas des de una pesta\u00f1a del navbar.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EstadisticasController", "fromLink": "App/Http/Controllers/EstadisticasController.html", "link": "App/Http/Controllers/EstadisticasController.html#method_mostrarPopularidadCampeones", "name": "App\\Http\\Controllers\\EstadisticasController::mostrarPopularidadCampeones", "doc": "&quot;M\u00e9todo que nos permite ver la popularidas de los campeones por % bas\u00e1ndonos\nen los datos que tenemos en la BBDD.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EstadisticasController", "fromLink": "App/Http/Controllers/EstadisticasController.html", "link": "App/Http/Controllers/EstadisticasController.html#method_mostrarPopularidadHechizos", "name": "App\\Http\\Controllers\\EstadisticasController::mostrarPopularidadHechizos", "doc": "&quot;M\u00e9todo que nos permite ver la popularidas de los hechizos por % bas\u00e1ndonos en\nlos datos que tenemos en la BBDD.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EstadisticasController", "fromLink": "App/Http/Controllers/EstadisticasController.html", "link": "App/Http/Controllers/EstadisticasController.html#method_mostrarBloqueoCampeones", "name": "App\\Http\\Controllers\\EstadisticasController::mostrarBloqueoCampeones", "doc": "&quot;M\u00e9todo que nos permite ver los campeones baneados por % bas\u00e1ndonos en los\ndatos que tenemos en la BBDD.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EstadisticasController", "fromLink": "App/Http/Controllers/EstadisticasController.html", "link": "App/Http/Controllers/EstadisticasController.html#method_guardaEstadisticas", "name": "App\\Http\\Controllers\\EstadisticasController::guardaEstadisticas", "doc": "&quot;M\u00e9todo principal que carga las estadisticas de un grupo de 10 ficheros que contienen\ndatos de 100 partidas cada uno de tipo ranked.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EstadisticasController", "fromLink": "App/Http/Controllers/EstadisticasController.html", "link": "App/Http/Controllers/EstadisticasController.html#method_guardaHechizo", "name": "App\\Http\\Controllers\\EstadisticasController::guardaHechizo", "doc": "&quot;M\u00e9todo complementario para guardar en la base de datos un hechizo usado por id,\nprimero comprueba que no se haya insertado el hechizo anteriormente.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EstadisticasController", "fromLink": "App/Http/Controllers/EstadisticasController.html", "link": "App/Http/Controllers/EstadisticasController.html#method_guardaCampeon", "name": "App\\Http\\Controllers\\EstadisticasController::guardaCampeon", "doc": "&quot;M\u00e9todo complementario para guardar en la base de datos un campeon usado por id,\nprimero comprueba que no se haya insertado el campeon anteriormente,\nentonces crea un nuevo registro o lo actualiza.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EstadisticasController", "fromLink": "App/Http/Controllers/EstadisticasController.html", "link": "App/Http/Controllers/EstadisticasController.html#method_guardaCampeonBan", "name": "App\\Http\\Controllers\\EstadisticasController::guardaCampeonBan", "doc": "&quot;M\u00e9todo complementario para guardar en la base de datos un campeon baneado por id,\nprimero comprueba que no se haya insertado el campeon anteriormente,\nentonces crea un nuevo registro o lo actualiza.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EstadisticasController", "fromLink": "App/Http/Controllers/EstadisticasController.html", "link": "App/Http/Controllers/EstadisticasController.html#method_popularidadCampeones", "name": "App\\Http\\Controllers\\EstadisticasController::popularidadCampeones", "doc": "&quot;M\u00e9todo complementario al que muestra los datos, \u00e9ste nos devuelve un array con\nlos datos de las estadisticas de popularidad de los campeones.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EstadisticasController", "fromLink": "App/Http/Controllers/EstadisticasController.html", "link": "App/Http/Controllers/EstadisticasController.html#method_popularidadHechizos", "name": "App\\Http\\Controllers\\EstadisticasController::popularidadHechizos", "doc": "&quot;M\u00e9todo complementario al que muestra los datos\n\u00e9ste nos devuelve un array con los datos de las estadisticas de popularidad de los hechizos&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EstadisticasController", "fromLink": "App/Http/Controllers/EstadisticasController.html", "link": "App/Http/Controllers/EstadisticasController.html#method_bloqueoCampeones", "name": "App\\Http\\Controllers\\EstadisticasController::bloqueoCampeones", "doc": "&quot;M\u00e9todo complementario al que muestra los datos\n\u00e9ste nos devuelve un array con los datos de las estadisticas de bloqueo de los campeones&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/FavoritoController.html", "name": "App\\Http\\Controllers\\FavoritoController", "doc": "&quot;Clase FavoritoController que se encarga de a\u00f1adir\/eliminar un registro a la base\nde datos, dependiendo si se ha dado al boton para guardar a favoritos una guia o\npara eliminarla.&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\FavoritoController", "fromLink": "App/Http/Controllers/FavoritoController.html", "link": "App/Http/Controllers/FavoritoController.html#method_guardarAFavoritos", "name": "App\\Http\\Controllers\\FavoritoController::guardarAFavoritos", "doc": "&quot;M\u00e9todo para a\u00f1adir una gu\u00eda a los favoritos del usuario&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\FavoritoController", "fromLink": "App/Http/Controllers/FavoritoController.html", "link": "App/Http/Controllers/FavoritoController.html#method_borrarDeFavoritos", "name": "App\\Http\\Controllers\\FavoritoController::borrarDeFavoritos", "doc": "&quot;M\u00e9todo para borrar una gu\u00eda a los favoritos del usuario&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/GuiaController.html", "name": "App\\Http\\Controllers\\GuiaController", "doc": "&quot;Clase GuiaController que es la que se encarga de redirecionar a las vistas adecuadas\npara las guias y verificar que los datos pasan la validaci\u00f3n correcta antes de guardarlos.&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\GuiaController", "fromLink": "App/Http/Controllers/GuiaController.html", "link": "App/Http/Controllers/GuiaController.html#method___construct", "name": "App\\Http\\Controllers\\GuiaController::__construct", "doc": "&quot;Crear nueva instancia del controlador.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\GuiaController", "fromLink": "App/Http/Controllers/GuiaController.html", "link": "App/Http/Controllers/GuiaController.html#method_index", "name": "App\\Http\\Controllers\\GuiaController::index", "doc": "&quot;M\u00e9todo principal que se llama al acceder a la pestanya guias.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\GuiaController", "fromLink": "App/Http/Controllers/GuiaController.html", "link": "App/Http/Controllers/GuiaController.html#method_obtenerGuia", "name": "App\\Http\\Controllers\\GuiaController::obtenerGuia", "doc": "&quot;M\u00e9todo que mustra una guia seleccionada, dependiendo de si es el usuario que\nla a creado o no, se le enviar\u00e1 a una vista u otra (editable o solo lectura).&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\GuiaController", "fromLink": "App/Http/Controllers/GuiaController.html", "link": "App/Http/Controllers/GuiaController.html#method_misGuias", "name": "App\\Http\\Controllers\\GuiaController::misGuias", "doc": "&quot;M\u00e9todo que devuelve las gu\u00edas que ha creado el usuario logueado por su id.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\GuiaController", "fromLink": "App/Http/Controllers/GuiaController.html", "link": "App/Http/Controllers/GuiaController.html#method_formularioCrearGuia", "name": "App\\Http\\Controllers\\GuiaController::formularioCrearGuia", "doc": "&quot;M\u00e9todo que devuelve el formulario para crear una guia.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\GuiaController", "fromLink": "App/Http/Controllers/GuiaController.html", "link": "App/Http/Controllers/GuiaController.html#method_crearGuia", "name": "App\\Http\\Controllers\\GuiaController::crearGuia", "doc": "&quot;M\u00e9todo que valida y registra una guia nueva a la base de datos.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\GuiaController", "fromLink": "App/Http/Controllers/GuiaController.html", "link": "App/Http/Controllers/GuiaController.html#method_editarGuia", "name": "App\\Http\\Controllers\\GuiaController::editarGuia", "doc": "&quot;M\u00e9todo que edita una guia existente.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\GuiaController", "fromLink": "App/Http/Controllers/GuiaController.html", "link": "App/Http/Controllers/GuiaController.html#method_eliminarGuia", "name": "App\\Http\\Controllers\\GuiaController::eliminarGuia", "doc": "&quot;M\u00e9todo que elimina una guia existente.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\GuiaController", "fromLink": "App/Http/Controllers/GuiaController.html", "link": "App/Http/Controllers/GuiaController.html#method_obtenerGuiasFavoritos", "name": "App\\Http\\Controllers\\GuiaController::obtenerGuiasFavoritos", "doc": "&quot;M\u00e9todo que muestra todas las guias que el usuario tiene a\u00f1adidas a favoritos.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\GuiaController", "fromLink": "App/Http/Controllers/GuiaController.html", "link": "App/Http/Controllers/GuiaController.html#method_actualizarValoracion", "name": "App\\Http\\Controllers\\GuiaController::actualizarValoracion", "doc": "&quot;M\u00e9todo que gestiona las valoraciones, permitira un tipo de valoraci\u00f3n (positiva o negativa)&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\GuiaController", "fromLink": "App/Http/Controllers/GuiaController.html", "link": "App/Http/Controllers/GuiaController.html#method_mostrarHechizosPopUp", "name": "App\\Http\\Controllers\\GuiaController::mostrarHechizosPopUp", "doc": "&quot;M\u00e9todo para obtener el popup de los hechizos para crear una guia&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\GuiaController", "fromLink": "App/Http/Controllers/GuiaController.html", "link": "App/Http/Controllers/GuiaController.html#method_mostrarCampeonesPopUp", "name": "App\\Http\\Controllers\\GuiaController::mostrarCampeonesPopUp", "doc": "&quot;M\u00e9todo para obtener el popup de los campeones para crear una guia&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\GuiaController", "fromLink": "App/Http/Controllers/GuiaController.html", "link": "App/Http/Controllers/GuiaController.html#method_mostrarRunasPopUp", "name": "App\\Http\\Controllers\\GuiaController::mostrarRunasPopUp", "doc": "&quot;M\u00e9todo para obtener el popup de las runas para crear una guia&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\GuiaController", "fromLink": "App/Http/Controllers/GuiaController.html", "link": "App/Http/Controllers/GuiaController.html#method_mostrarObjetosPopUp", "name": "App\\Http\\Controllers\\GuiaController::mostrarObjetosPopUp", "doc": "&quot;M\u00e9todo para obtener el popup de los objetos para crear una guia&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\GuiaController", "fromLink": "App/Http/Controllers/GuiaController.html", "link": "App/Http/Controllers/GuiaController.html#method_mostrarHabilidadesPopUp", "name": "App\\Http\\Controllers\\GuiaController::mostrarHabilidadesPopUp", "doc": "&quot;M\u00e9todo para obtener el popup de las habilidades de un campeon en base a su id para crear una guia&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/HechizoController.html", "name": "App\\Http\\Controllers\\HechizoController", "doc": "&quot;Clase HechizoController que llama la vista para mostrar los datos referente a los\nhechizos, obteniendo la informaci\u00f3n de la API Riot en formato .json.&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\HechizoController", "fromLink": "App/Http/Controllers/HechizoController.html", "link": "App/Http/Controllers/HechizoController.html#method_index", "name": "App\\Http\\Controllers\\HechizoController::index", "doc": "&quot;M\u00e9todo principal que nos devuelve la vista de todos los hechizos existentes&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\HechizoController", "fromLink": "App/Http/Controllers/HechizoController.html", "link": "App/Http/Controllers/HechizoController.html#method_obtenerHechizos", "name": "App\\Http\\Controllers\\HechizoController::obtenerHechizos", "doc": "&quot;M\u00e9todo que obtiene todos los hechizos de invocador, en el idioma que se est\u00e1 visualizando la p\u00e0gina.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/HomeController.html", "name": "App\\Http\\Controllers\\HomeController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\HomeController", "fromLink": "App/Http/Controllers/HomeController.html", "link": "App/Http/Controllers/HomeController.html#method___construct", "name": "App\\Http\\Controllers\\HomeController::__construct", "doc": "&quot;Create a new controller instance.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\HomeController", "fromLink": "App/Http/Controllers/HomeController.html", "link": "App/Http/Controllers/HomeController.html#method_index", "name": "App\\Http\\Controllers\\HomeController::index", "doc": "&quot;Show the application dashboard.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/InvocadorController.html", "name": "App\\Http\\Controllers\\InvocadorController", "doc": "&quot;Clase InvocadorController que llama la vista para mostrar los datos referente a un\ninvocador seg\u00fan su regi\u00f3n, obteniendo la informaci\u00f3n de la API Riot en formato .json.&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\InvocadorController", "fromLink": "App/Http/Controllers/InvocadorController.html", "link": "App/Http/Controllers/InvocadorController.html#method_index", "name": "App\\Http\\Controllers\\InvocadorController::index", "doc": "&quot;M\u00e9todo principal que se llama al hacer una b\u00fasqueda de un jugador. Nos lleva a la vista de su perfil.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\InvocadorController", "fromLink": "App/Http/Controllers/InvocadorController.html", "link": "App/Http/Controllers/InvocadorController.html#method_obtenerPerfil", "name": "App\\Http\\Controllers\\InvocadorController::obtenerPerfil", "doc": "&quot;M\u00e9todo que a partir de un nick o nombre de jugador, obtiene sus datos de perfil y stats.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\InvocadorController", "fromLink": "App/Http/Controllers/InvocadorController.html", "link": "App/Http/Controllers/InvocadorController.html#method_obtenerEstadisticas", "name": "App\\Http\\Controllers\\InvocadorController::obtenerEstadisticas", "doc": "&quot;M\u00e9todo que a partir de un id y region obtienes sus estadisticas&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\InvocadorController", "fromLink": "App/Http/Controllers/InvocadorController.html", "link": "App/Http/Controllers/InvocadorController.html#method_obtenerLiga", "name": "App\\Http\\Controllers\\InvocadorController::obtenerLiga", "doc": "&quot;M\u00e9todo que a partir de un id obtienes sus ligas&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\InvocadorController", "fromLink": "App/Http/Controllers/InvocadorController.html", "link": "App/Http/Controllers/InvocadorController.html#method_obtenerListaPartidas", "name": "App\\Http\\Controllers\\InvocadorController::obtenerListaPartidas", "doc": "&quot;M\u00e9todo principal que nos devuelve las \u00faltimas 7 partidas de un usuario en base a su nombre y regi\u00f3n.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\InvocadorController", "fromLink": "App/Http/Controllers/InvocadorController.html", "link": "App/Http/Controllers/InvocadorController.html#method_obtenerPartida", "name": "App\\Http\\Controllers\\InvocadorController::obtenerPartida", "doc": "&quot;M\u00e9todo complementario de obtenerListaPartidas donde obtenemos una sola partida para guardarla&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\InvocadorController", "fromLink": "App/Http/Controllers/InvocadorController.html", "link": "App/Http/Controllers/InvocadorController.html#method_obtenerArrayCampeones", "name": "App\\Http\\Controllers\\InvocadorController::obtenerArrayCampeones", "doc": "&quot;M\u00e9todo para obtener un array que nos permita referenciar una id de un personaje con su nombre y su imagen.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\InvocadorController", "fromLink": "App/Http/Controllers/InvocadorController.html", "link": "App/Http/Controllers/InvocadorController.html#method_obtenerArrayHechizos", "name": "App\\Http\\Controllers\\InvocadorController::obtenerArrayHechizos", "doc": "&quot;M\u00e9todo para obtener un array que nos permita referenciar una id de un hechizo con su nombre y su imagen.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/LanguageController.html", "name": "App\\Http\\Controllers\\LanguageController", "doc": "&quot;Clase LanguageController se encarga de cambiar el idioma en el app.blade.php,\npara guardarlo en sesi\u00f3n&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\LanguageController", "fromLink": "App/Http/Controllers/LanguageController.html", "link": "App/Http/Controllers/LanguageController.html#method_switchLang", "name": "App\\Http\\Controllers\\LanguageController::switchLang", "doc": "&quot;M\u00e9todo que se encargara del cambio de lenguaje del sitio web y lo guardar\u00e0 en sesi\u00f3n&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/MensajeController.html", "name": "App\\Http\\Controllers\\MensajeController", "doc": "&quot;Clase MensajeController que nos servira para gestionar los mensajes y mostrarlos.&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\MensajeController", "fromLink": "App/Http/Controllers/MensajeController.html", "link": "App/Http/Controllers/MensajeController.html#method_index", "name": "App\\Http\\Controllers\\MensajeController::index", "doc": "&quot;Muestra todos los threads (conversaciones) de mensajes segun el usuario logeado.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\MensajeController", "fromLink": "App/Http/Controllers/MensajeController.html", "link": "App/Http/Controllers/MensajeController.html#method_show", "name": "App\\Http\\Controllers\\MensajeController::show", "doc": "&quot;Muestra un thread (conversacion) de mensajes segun la id&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\MensajeController", "fromLink": "App/Http/Controllers/MensajeController.html", "link": "App/Http/Controllers/MensajeController.html#method_create", "name": "App\\Http\\Controllers\\MensajeController::create", "doc": "&quot;Crea un nuevo thread (conversacion) de mensajes.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\MensajeController", "fromLink": "App/Http/Controllers/MensajeController.html", "link": "App/Http/Controllers/MensajeController.html#method_store", "name": "App\\Http\\Controllers\\MensajeController::store", "doc": "&quot;Guarda un nuevo mensaje en un thread (conversacion) nuevo&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\MensajeController", "fromLink": "App/Http/Controllers/MensajeController.html", "link": "App/Http/Controllers/MensajeController.html#method_update", "name": "App\\Http\\Controllers\\MensajeController::update", "doc": "&quot;A\u00f1ade un mensaje nuevo para el thread (conversacion) actual&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/ObjetoController.html", "name": "App\\Http\\Controllers\\ObjetoController", "doc": "&quot;Clase ObjetoController que llama la vista para mostrar los datos referente a los\nobjetos, obteniendo la informaci\u00f3n de la API Riot en formato .json.&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\ObjetoController", "fromLink": "App/Http/Controllers/ObjetoController.html", "link": "App/Http/Controllers/ObjetoController.html#method_index", "name": "App\\Http\\Controllers\\ObjetoController::index", "doc": "&quot;M\u00e9todo principal que se llama al acceder a la pestanya objetos.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\ObjetoController", "fromLink": "App/Http/Controllers/ObjetoController.html", "link": "App/Http/Controllers/ObjetoController.html#method_mostrarObjeto", "name": "App\\Http\\Controllers\\ObjetoController::mostrarObjeto", "doc": "&quot;M\u00e9todo que devuelve a la vista la informaci\u00f3n sobre el objeto seleccionado.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\ObjetoController", "fromLink": "App/Http/Controllers/ObjetoController.html", "link": "App/Http/Controllers/ObjetoController.html#method_obtenerObjetos", "name": "App\\Http\\Controllers\\ObjetoController::obtenerObjetos", "doc": "&quot;M\u00e9todo que obtiene todos los objetos, en el idioma que se est\u00e1 visualizando la p\u00e0gina.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\ObjetoController", "fromLink": "App/Http/Controllers/ObjetoController.html", "link": "App/Http/Controllers/ObjetoController.html#method_obtenerObjetoPorId", "name": "App\\Http\\Controllers\\ObjetoController::obtenerObjetoPorId", "doc": "&quot;M\u00e9todo que a partir de una id, obtiene el objeto deseado.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/UserController.html", "name": "App\\Http\\Controllers\\UserController", "doc": "&quot;Clase UserController, gestiona todos los aspectos relacionados con el usuario,\naspectos como su perfil, su contrase\u00f1a, su avatar y la eliminaci\u00f3n del mismo.&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\UserController", "fromLink": "App/Http/Controllers/UserController.html", "link": "App/Http/Controllers/UserController.html#method_mostrarPerfil", "name": "App\\Http\\Controllers\\UserController::mostrarPerfil", "doc": "&quot;Mostrar un perfil&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\UserController", "fromLink": "App/Http/Controllers/UserController.html", "link": "App/Http/Controllers/UserController.html#method_formularioEditarUser", "name": "App\\Http\\Controllers\\UserController::formularioEditarUser", "doc": "&quot;Redireccionar al formulario para editar informaci\u00f3n del usuario.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\UserController", "fromLink": "App/Http/Controllers/UserController.html", "link": "App/Http/Controllers/UserController.html#method_editarUser", "name": "App\\Http\\Controllers\\UserController::editarUser", "doc": "&quot;M\u00e9todo para cambiar los datos del usuario.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\UserController", "fromLink": "App/Http/Controllers/UserController.html", "link": "App/Http/Controllers/UserController.html#method_editarUserPassword", "name": "App\\Http\\Controllers\\UserController::editarUserPassword", "doc": "&quot;M\u00e9todo para cambiar el password del usuario.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\UserController", "fromLink": "App/Http/Controllers/UserController.html", "link": "App/Http/Controllers/UserController.html#method_eliminarUser", "name": "App\\Http\\Controllers\\UserController::eliminarUser", "doc": "&quot;Eliminar el user especificado.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\UserController", "fromLink": "App/Http/Controllers/UserController.html", "link": "App/Http/Controllers/UserController.html#method_mostrarAvatar", "name": "App\\Http\\Controllers\\UserController::mostrarAvatar", "doc": "&quot;M\u00e9todo que carga la imagen binaria de la base de datos.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/VotacionController.html", "name": "App\\Http\\Controllers\\VotacionController", "doc": "&quot;Clase VotacionController que se encarga de a\u00f1adir\/eliminar un registro a la base\nde datos, dependiendo si se ha dado al boton de me gusta o de no me gusta.&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\VotacionController", "fromLink": "App/Http/Controllers/VotacionController.html", "link": "App/Http/Controllers/VotacionController.html#method_votacion", "name": "App\\Http\\Controllers\\VotacionController::votacion", "doc": "&quot;M\u00e9todo que gestiona las votaciones&quot;"},
            
            {"type": "Class", "fromName": "App\\Http", "fromLink": "App/Http.html", "link": "App/Http/Kernel.html", "name": "App\\Http\\Kernel", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Http\\Middleware", "fromLink": "App/Http/Middleware.html", "link": "App/Http/Middleware/Authenticate.html", "name": "App\\Http\\Middleware\\Authenticate", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Middleware\\Authenticate", "fromLink": "App/Http/Middleware/Authenticate.html", "link": "App/Http/Middleware/Authenticate.html#method_handle", "name": "App\\Http\\Middleware\\Authenticate::handle", "doc": "&quot;Handle an incoming request.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Middleware", "fromLink": "App/Http/Middleware.html", "link": "App/Http/Middleware/EncryptCookies.html", "name": "App\\Http\\Middleware\\EncryptCookies", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Http\\Middleware", "fromLink": "App/Http/Middleware.html", "link": "App/Http/Middleware/Language.html", "name": "App\\Http\\Middleware\\Language", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Middleware\\Language", "fromLink": "App/Http/Middleware/Language.html", "link": "App/Http/Middleware/Language.html#method_handle", "name": "App\\Http\\Middleware\\Language::handle", "doc": "&quot;handle del idioma, se preocupara de poner el lenguaje que se ha elegido en sesi\u00f3n&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Middleware", "fromLink": "App/Http/Middleware.html", "link": "App/Http/Middleware/RedirectIfAuthenticated.html", "name": "App\\Http\\Middleware\\RedirectIfAuthenticated", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Middleware\\RedirectIfAuthenticated", "fromLink": "App/Http/Middleware/RedirectIfAuthenticated.html", "link": "App/Http/Middleware/RedirectIfAuthenticated.html#method_handle", "name": "App\\Http\\Middleware\\RedirectIfAuthenticated::handle", "doc": "&quot;Handle an incoming request.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Middleware", "fromLink": "App/Http/Middleware.html", "link": "App/Http/Middleware/VerifyCsrfToken.html", "name": "App\\Http\\Middleware\\VerifyCsrfToken", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Http\\Requests", "fromLink": "App/Http/Requests.html", "link": "App/Http/Requests/Request.html", "name": "App\\Http\\Requests\\Request", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Jobs", "fromLink": "App/Jobs.html", "link": "App/Jobs/Job.html", "name": "App\\Jobs\\Job", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Policies", "fromLink": "App/Policies.html", "link": "App/Policies/UserPolicy.html", "name": "App\\Policies\\UserPolicy", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Policies\\UserPolicy", "fromLink": "App/Policies/UserPolicy.html", "link": "App/Policies/UserPolicy.html#method_permisoUser", "name": "App\\Policies\\UserPolicy::permisoUser", "doc": "&quot;Determinamos si el usuario especificado se puede borrar por la persona que lo intenta.&quot;"},
            
            {"type": "Class", "fromName": "App\\Providers", "fromLink": "App/Providers.html", "link": "App/Providers/AppServiceProvider.html", "name": "App\\Providers\\AppServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Providers\\AppServiceProvider", "fromLink": "App/Providers/AppServiceProvider.html", "link": "App/Providers/AppServiceProvider.html#method_boot", "name": "App\\Providers\\AppServiceProvider::boot", "doc": "&quot;Bootstrap any application services.&quot;"},
                    {"type": "Method", "fromName": "App\\Providers\\AppServiceProvider", "fromLink": "App/Providers/AppServiceProvider.html", "link": "App/Providers/AppServiceProvider.html#method_register", "name": "App\\Providers\\AppServiceProvider::register", "doc": "&quot;Register any application services.&quot;"},
            
            {"type": "Class", "fromName": "App\\Providers", "fromLink": "App/Providers.html", "link": "App/Providers/AuthServiceProvider.html", "name": "App\\Providers\\AuthServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Providers\\AuthServiceProvider", "fromLink": "App/Providers/AuthServiceProvider.html", "link": "App/Providers/AuthServiceProvider.html#method_boot", "name": "App\\Providers\\AuthServiceProvider::boot", "doc": "&quot;Register any application authentication \/ authorization services.&quot;"},
            
            {"type": "Class", "fromName": "App\\Providers", "fromLink": "App/Providers.html", "link": "App/Providers/EventServiceProvider.html", "name": "App\\Providers\\EventServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Providers\\EventServiceProvider", "fromLink": "App/Providers/EventServiceProvider.html", "link": "App/Providers/EventServiceProvider.html#method_boot", "name": "App\\Providers\\EventServiceProvider::boot", "doc": "&quot;Register any other events for your application.&quot;"},
            
            {"type": "Class", "fromName": "App\\Providers", "fromLink": "App/Providers.html", "link": "App/Providers/RouteServiceProvider.html", "name": "App\\Providers\\RouteServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Providers\\RouteServiceProvider", "fromLink": "App/Providers/RouteServiceProvider.html", "link": "App/Providers/RouteServiceProvider.html#method_boot", "name": "App\\Providers\\RouteServiceProvider::boot", "doc": "&quot;Define your route model bindings, pattern filters, etc.&quot;"},
                    {"type": "Method", "fromName": "App\\Providers\\RouteServiceProvider", "fromLink": "App/Providers/RouteServiceProvider.html", "link": "App/Providers/RouteServiceProvider.html#method_map", "name": "App\\Providers\\RouteServiceProvider::map", "doc": "&quot;Define the routes for the application.&quot;"},
            
            {"type": "Class", "fromName": "App\\Repositories", "fromLink": "App/Repositories.html", "link": "App/Repositories/GuiaRepository.html", "name": "App\\Repositories\\GuiaRepository", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Repositories\\GuiaRepository", "fromLink": "App/Repositories/GuiaRepository.html", "link": "App/Repositories/GuiaRepository.html#method_delUser", "name": "App\\Repositories\\GuiaRepository::delUser", "doc": "&quot;Obtener todas las guias del usuario.&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\GuiaRepository", "fromLink": "App/Repositories/GuiaRepository.html", "link": "App/Repositories/GuiaRepository.html#method_guiasFavoritas", "name": "App\\Repositories\\GuiaRepository::guiasFavoritas", "doc": "&quot;Obtener las guias favoritas del usuario en base a su id&quot;"},
                    {"type": "Method", "fromName": "App\\Repositories\\GuiaRepository", "fromLink": "App/Repositories/GuiaRepository.html", "link": "App/Repositories/GuiaRepository.html#method_totalGuias", "name": "App\\Repositories\\GuiaRepository::totalGuias", "doc": "&quot;Obtiene todas las guias creadas en la base de datos.&quot;"},
            
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/Role.html", "name": "App\\Role", "doc": "&quot;Clase Role para los roles, proporciona soporte para las guias.&quot;"},
                    
            {"type": "Trait", "fromName": "App\\Traits", "fromLink": "App/Traits.html", "link": "App/Traits/TraitCampeones.html", "name": "App\\Traits\\TraitCampeones", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Traits\\TraitCampeones", "fromLink": "App/Traits/TraitCampeones.html", "link": "App/Traits/TraitCampeones.html#method_obtenerCampeones", "name": "App\\Traits\\TraitCampeones::obtenerCampeones", "doc": "&quot;M\u00e9todo que obtiene todos los campeones, en el idioma que se est\u00e1 visualizando la p\u00e0gina.&quot;"},
                    {"type": "Method", "fromName": "App\\Traits\\TraitCampeones", "fromLink": "App/Traits/TraitCampeones.html", "link": "App/Traits/TraitCampeones.html#method_obtenerHabilidadesCampeon", "name": "App\\Traits\\TraitCampeones::obtenerHabilidadesCampeon", "doc": "&quot;M\u00e9todo para obtener las habilidades de un campe\u00f3n, en base a su id,\nen el idioma en el que se est\u00e9 visualizando la p\u00e1gina.&quot;"},
            
            {"type": "Trait", "fromName": "App\\Traits", "fromLink": "App/Traits.html", "link": "App/Traits/TraitGraficos.html", "name": "App\\Traits\\TraitGraficos", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Traits\\TraitGraficos", "fromLink": "App/Traits/TraitGraficos.html", "link": "App/Traits/TraitGraficos.html#method_generaGraficoPopularidadCampeones", "name": "App\\Traits\\TraitGraficos::generaGraficoPopularidadCampeones", "doc": "&quot;M\u00e9todo para generar una imagen del grafico de popularidad de campeones,\ngenerando a partir de las estad\u00edsticas.&quot;"},
                    {"type": "Method", "fromName": "App\\Traits\\TraitGraficos", "fromLink": "App/Traits/TraitGraficos.html", "link": "App/Traits/TraitGraficos.html#method_generaGraficoBloqueoCampeones", "name": "App\\Traits\\TraitGraficos::generaGraficoBloqueoCampeones", "doc": "&quot;M\u00e9todo para generar una imagen del grafico de bloqueo de campeones,\ngenerando a partir de las estad\u00edsticas.&quot;"},
                    {"type": "Method", "fromName": "App\\Traits\\TraitGraficos", "fromLink": "App/Traits/TraitGraficos.html", "link": "App/Traits/TraitGraficos.html#method_generaGraficoPopularidadHechizos", "name": "App\\Traits\\TraitGraficos::generaGraficoPopularidadHechizos", "doc": "&quot;M\u00e9todo para generar una imagen del grafico de popularidad de hechizos,\ngenerando a partir de las estad\u00edsticas.&quot;"},
            
            {"type": "Trait", "fromName": "App\\Traits", "fromLink": "App/Traits.html", "link": "App/Traits/TraitHechizos.html", "name": "App\\Traits\\TraitHechizos", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Traits\\TraitHechizos", "fromLink": "App/Traits/TraitHechizos.html", "link": "App/Traits/TraitHechizos.html#method_obtenerHechizos", "name": "App\\Traits\\TraitHechizos::obtenerHechizos", "doc": "&quot;M\u00e9todo que obtiene todos los hechizos, en el idioma que se est\u00e1 visualizando la p\u00e0gina.&quot;"},
            
            {"type": "Trait", "fromName": "App\\Traits", "fromLink": "App/Traits.html", "link": "App/Traits/TraitObjetos.html", "name": "App\\Traits\\TraitObjetos", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Traits\\TraitObjetos", "fromLink": "App/Traits/TraitObjetos.html", "link": "App/Traits/TraitObjetos.html#method_obtenerObjetos", "name": "App\\Traits\\TraitObjetos::obtenerObjetos", "doc": "&quot;M\u00e9todo que obtiene todos los objetos, en el idioma que se est\u00e1 visualizando la p\u00e0gina.&quot;"},
            
            {"type": "Trait", "fromName": "App\\Traits", "fromLink": "App/Traits.html", "link": "App/Traits/TraitRunas.html", "name": "App\\Traits\\TraitRunas", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Traits\\TraitRunas", "fromLink": "App/Traits/TraitRunas.html", "link": "App/Traits/TraitRunas.html#method_obtenerRunas", "name": "App\\Traits\\TraitRunas::obtenerRunas", "doc": "&quot;M\u00e9todo que obtiene todas las runas de grado 3 (Existen grado 1, 2 y 3),\nen el idioma que se est\u00e1 visualizando la p\u00e0gina.&quot;"},
            
            {"type": "Trait", "fromName": "App\\Traits", "fromLink": "App/Traits.html", "link": "App/Traits/TraitVersionActual.html", "name": "App\\Traits\\TraitVersionActual", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Traits\\TraitVersionActual", "fromLink": "App/Traits/TraitVersionActual.html", "link": "App/Traits/TraitVersionActual.html#method_version", "name": "App\\Traits\\TraitVersionActual::version", "doc": "&quot;M\u00e9todo para obtener la versi\u00f3n actual del juego.&quot;"},
            
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/User.html", "name": "App\\User", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\User", "fromLink": "App/User.html", "link": "App/User.html#method_guias", "name": "App\\User::guias", "doc": "&quot;Obtener todas las guias que el usuario a creado.&quot;"},
                    {"type": "Method", "fromName": "App\\User", "fromLink": "App/User.html", "link": "App/User.html#method_favorito", "name": "App\\User::favorito", "doc": "&quot;Obtener todos los favoritos.&quot;"},
                    {"type": "Method", "fromName": "App\\User", "fromLink": "App/User.html", "link": "App/User.html#method_message", "name": "App\\User::message", "doc": "&quot;Obtener todos los mensajes.&quot;"},
                    {"type": "Method", "fromName": "App\\User", "fromLink": "App/User.html", "link": "App/User.html#method_votacions", "name": "App\\User::votacions", "doc": "&quot;Obtiene las votaciones que ha realizado el usuario&quot;"},
            
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/Votacion.html", "name": "App\\Votacion", "doc": "&quot;&quot;"},
                    
            {"type": "Class",  "link": "pBarcode128.html", "name": "pBarcode128", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "pBarcode128", "fromLink": "pBarcode128.html", "link": "pBarcode128.html#method_pBarcode128", "name": "pBarcode128::pBarcode128", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pBarcode128", "fromLink": "pBarcode128.html", "link": "pBarcode128.html#method_getSize", "name": "pBarcode128::getSize", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pBarcode128", "fromLink": "pBarcode128.html", "link": "pBarcode128.html#method_encode128", "name": "pBarcode128::encode128", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pBarcode128", "fromLink": "pBarcode128.html", "link": "pBarcode128.html#method_draw", "name": "pBarcode128::draw", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pBarcode128", "fromLink": "pBarcode128.html", "link": "pBarcode128.html#method_left", "name": "pBarcode128::left", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pBarcode128", "fromLink": "pBarcode128.html", "link": "pBarcode128.html#method_right", "name": "pBarcode128::right", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pBarcode128", "fromLink": "pBarcode128.html", "link": "pBarcode128.html#method_mid", "name": "pBarcode128::mid", "doc": "&quot;&quot;"},
            
            {"type": "Class",  "link": "pBarcode39.html", "name": "pBarcode39", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "pBarcode39", "fromLink": "pBarcode39.html", "link": "pBarcode39.html#method_pBarcode39", "name": "pBarcode39::pBarcode39", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pBarcode39", "fromLink": "pBarcode39.html", "link": "pBarcode39.html#method_getSize", "name": "pBarcode39::getSize", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pBarcode39", "fromLink": "pBarcode39.html", "link": "pBarcode39.html#method_encode39", "name": "pBarcode39::encode39", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pBarcode39", "fromLink": "pBarcode39.html", "link": "pBarcode39.html#method_draw", "name": "pBarcode39::draw", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pBarcode39", "fromLink": "pBarcode39.html", "link": "pBarcode39.html#method_checksum", "name": "pBarcode39::checksum", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pBarcode39", "fromLink": "pBarcode39.html", "link": "pBarcode39.html#method_left", "name": "pBarcode39::left", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pBarcode39", "fromLink": "pBarcode39.html", "link": "pBarcode39.html#method_right", "name": "pBarcode39::right", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pBarcode39", "fromLink": "pBarcode39.html", "link": "pBarcode39.html#method_mid", "name": "pBarcode39::mid", "doc": "&quot;&quot;"},
            
            {"type": "Class",  "link": "pBubble.html", "name": "pBubble", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "pBubble", "fromLink": "pBubble.html", "link": "pBubble.html#method_pBubble", "name": "pBubble::pBubble", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pBubble", "fromLink": "pBubble.html", "link": "pBubble.html#method_bubbleScale", "name": "pBubble::bubbleScale", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pBubble", "fromLink": "pBubble.html", "link": "pBubble.html#method_resetSeriesColors", "name": "pBubble::resetSeriesColors", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pBubble", "fromLink": "pBubble.html", "link": "pBubble.html#method_drawBubbleChart", "name": "pBubble::drawBubbleChart", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pBubble", "fromLink": "pBubble.html", "link": "pBubble.html#method_writeBubbleLabel", "name": "pBubble::writeBubbleLabel", "doc": "&quot;&quot;"},
            
            {"type": "Class",  "link": "pCache.html", "name": "pCache", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "pCache", "fromLink": "pCache.html", "link": "pCache.html#method_pCache", "name": "pCache::pCache", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pCache", "fromLink": "pCache.html", "link": "pCache.html#method_flush", "name": "pCache::flush", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pCache", "fromLink": "pCache.html", "link": "pCache.html#method_getHash", "name": "pCache::getHash", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pCache", "fromLink": "pCache.html", "link": "pCache.html#method_writeToCache", "name": "pCache::writeToCache", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pCache", "fromLink": "pCache.html", "link": "pCache.html#method_removeOlderThan", "name": "pCache::removeOlderThan", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pCache", "fromLink": "pCache.html", "link": "pCache.html#method_remove", "name": "pCache::remove", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pCache", "fromLink": "pCache.html", "link": "pCache.html#method_dbRemoval", "name": "pCache::dbRemoval", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pCache", "fromLink": "pCache.html", "link": "pCache.html#method_isInCache", "name": "pCache::isInCache", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pCache", "fromLink": "pCache.html", "link": "pCache.html#method_autoOutput", "name": "pCache::autoOutput", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pCache", "fromLink": "pCache.html", "link": "pCache.html#method_strokeFromCache", "name": "pCache::strokeFromCache", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pCache", "fromLink": "pCache.html", "link": "pCache.html#method_saveFromCache", "name": "pCache::saveFromCache", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pCache", "fromLink": "pCache.html", "link": "pCache.html#method_getFromCache", "name": "pCache::getFromCache", "doc": "&quot;&quot;"},
            
            {"type": "Class",  "link": "pData.html", "name": "pData", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_pData", "name": "pData::pData", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_addPoints", "name": "pData::addPoints", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_stripVOID", "name": "pData::stripVOID", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_getSerieCount", "name": "pData::getSerieCount", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_removeSerie", "name": "pData::removeSerie", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_getValueAt", "name": "pData::getValueAt", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_getValues", "name": "pData::getValues", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_reverseSerie", "name": "pData::reverseSerie", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_getSum", "name": "pData::getSum", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_getMax", "name": "pData::getMax", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_getMin", "name": "pData::getMin", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_setSerieShape", "name": "pData::setSerieShape", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_setSerieDescription", "name": "pData::setSerieDescription", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_setSerieDrawable", "name": "pData::setSerieDrawable", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_setSeriePicture", "name": "pData::setSeriePicture", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_setXAxisName", "name": "pData::setXAxisName", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_setXAxisDisplay", "name": "pData::setXAxisDisplay", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_setXAxisUnit", "name": "pData::setXAxisUnit", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_setAbscissa", "name": "pData::setAbscissa", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_setAbsicssaPosition", "name": "pData::setAbsicssaPosition", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_setAbscissaName", "name": "pData::setAbscissaName", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_setScatterSerie", "name": "pData::setScatterSerie", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_setScatterSerieShape", "name": "pData::setScatterSerieShape", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_setScatterSerieDescription", "name": "pData::setScatterSerieDescription", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_setScatterSeriePicture", "name": "pData::setScatterSeriePicture", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_setScatterSerieDrawable", "name": "pData::setScatterSerieDrawable", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_setScatterSerieTicks", "name": "pData::setScatterSerieTicks", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_setScatterSerieWeight", "name": "pData::setScatterSerieWeight", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_setScatterSerieColor", "name": "pData::setScatterSerieColor", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_limits", "name": "pData::limits", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_drawAll", "name": "pData::drawAll", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_getSerieAverage", "name": "pData::getSerieAverage", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_getGeometricMean", "name": "pData::getGeometricMean", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_getHarmonicMean", "name": "pData::getHarmonicMean", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_getStandardDeviation", "name": "pData::getStandardDeviation", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_getCoefficientOfVariation", "name": "pData::getCoefficientOfVariation", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_getSerieMedian", "name": "pData::getSerieMedian", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_getSeriePercentile", "name": "pData::getSeriePercentile", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_addRandomValues", "name": "pData::addRandomValues", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_containsData", "name": "pData::containsData", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_setAxisDisplay", "name": "pData::setAxisDisplay", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_setAxisPosition", "name": "pData::setAxisPosition", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_setAxisUnit", "name": "pData::setAxisUnit", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_setAxisName", "name": "pData::setAxisName", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_setAxisColor", "name": "pData::setAxisColor", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_setAxisXY", "name": "pData::setAxisXY", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_setSerieOnAxis", "name": "pData::setSerieOnAxis", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_setSerieTicks", "name": "pData::setSerieTicks", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_setSerieWeight", "name": "pData::setSerieWeight", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_getSeriePalette", "name": "pData::getSeriePalette", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_setPalette", "name": "pData::setPalette", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_loadPalette", "name": "pData::loadPalette", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_initScatterSerie", "name": "pData::initScatterSerie", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_initialise", "name": "pData::initialise", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_normalize", "name": "pData::normalize", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_importFromCSV", "name": "pData::importFromCSV", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_createFunctionSerie", "name": "pData::createFunctionSerie", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_negateValues", "name": "pData::negateValues", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_getData", "name": "pData::getData", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_savePalette", "name": "pData::savePalette", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_getPalette", "name": "pData::getPalette", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_saveAxisConfig", "name": "pData::saveAxisConfig", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_saveYMargin", "name": "pData::saveYMargin", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_saveExtendedData", "name": "pData::saveExtendedData", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_saveOrientation", "name": "pData::saveOrientation", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_convertToArray", "name": "pData::convertToArray", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method___toString", "name": "pData::__toString", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_left", "name": "pData::left", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_right", "name": "pData::right", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pData", "fromLink": "pData.html", "link": "pData.html#method_mid", "name": "pData::mid", "doc": "&quot;&quot;"},
            
            {"type": "Class",  "link": "pDraw.html", "name": "pDraw", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_countDrawableSeries", "name": "pDraw::countDrawableSeries", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_fixBoxCoordinates", "name": "pDraw::fixBoxCoordinates", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawPolygon", "name": "pDraw::drawPolygon", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_offsetCorrection", "name": "pDraw::offsetCorrection", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawRoundedRectangle", "name": "pDraw::drawRoundedRectangle", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawRoundedFilledRectangle", "name": "pDraw::drawRoundedFilledRectangle", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawRoundedFilledRectangle_deprecated", "name": "pDraw::drawRoundedFilledRectangle_deprecated", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawRectangle", "name": "pDraw::drawRectangle", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawFilledRectangle", "name": "pDraw::drawFilledRectangle", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawRectangleMarker", "name": "pDraw::drawRectangleMarker", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawSpline", "name": "pDraw::drawSpline", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawBezier", "name": "pDraw::drawBezier", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawLine", "name": "pDraw::drawLine", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawCircle", "name": "pDraw::drawCircle", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawFilledCircle", "name": "pDraw::drawFilledCircle", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawText", "name": "pDraw::drawText", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawGradientArea", "name": "pDraw::drawGradientArea", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawAntialiasPixel", "name": "pDraw::drawAntialiasPixel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawAlphaPixel", "name": "pDraw::drawAlphaPixel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_convertAlpha", "name": "pDraw::convertAlpha", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_allocateColor", "name": "pDraw::allocateColor", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawFromPNG", "name": "pDraw::drawFromPNG", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawFromGIF", "name": "pDraw::drawFromGIF", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawFromJPG", "name": "pDraw::drawFromJPG", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_getPicInfo", "name": "pDraw::getPicInfo", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawFromPicture", "name": "pDraw::drawFromPicture", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawArrow", "name": "pDraw::drawArrow", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawArrowLabel", "name": "pDraw::drawArrowLabel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawProgress", "name": "pDraw::drawProgress", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_getLegendSize", "name": "pDraw::getLegendSize", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawLegend", "name": "pDraw::drawLegend", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawScale", "name": "pDraw::drawScale", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_isValidLabel", "name": "pDraw::isValidLabel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_computeScale", "name": "pDraw::computeScale", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_processScale", "name": "pDraw::processScale", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_modulo", "name": "pDraw::modulo", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawXThreshold", "name": "pDraw::drawXThreshold", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawXThresholdArea", "name": "pDraw::drawXThresholdArea", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawThreshold", "name": "pDraw::drawThreshold", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawThresholdArea", "name": "pDraw::drawThresholdArea", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_scaleGetXSettings", "name": "pDraw::scaleGetXSettings", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_scaleComputeY", "name": "pDraw::scaleComputeY", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_scaleFormat", "name": "pDraw::scaleFormat", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_writeBounds", "name": "pDraw::writeBounds", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawPlotChart", "name": "pDraw::drawPlotChart", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawSplineChart", "name": "pDraw::drawSplineChart", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawFilledSplineChart", "name": "pDraw::drawFilledSplineChart", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawLineChart", "name": "pDraw::drawLineChart", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawZoneChart", "name": "pDraw::drawZoneChart", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawStepChart", "name": "pDraw::drawStepChart", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawFilledStepChart", "name": "pDraw::drawFilledStepChart", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawAreaChart", "name": "pDraw::drawAreaChart", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawBarChart", "name": "pDraw::drawBarChart", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawStackedBarChart", "name": "pDraw::drawStackedBarChart", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawStackedAreaChart", "name": "pDraw::drawStackedAreaChart", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_getRandomColor", "name": "pDraw::getRandomColor", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_validatePalette", "name": "pDraw::validatePalette", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawDerivative", "name": "pDraw::drawDerivative", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawBestFit", "name": "pDraw::drawBestFit", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_writeLabel", "name": "pDraw::writeLabel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawLabelBox", "name": "pDraw::drawLabelBox", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawShape", "name": "pDraw::drawShape", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_drawPolygonChart", "name": "pDraw::drawPolygonChart", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pDraw", "fromLink": "pDraw.html", "link": "pDraw.html#method_getAbscissaMargin", "name": "pDraw::getAbscissaMargin", "doc": "&quot;&quot;"},
            
            {"type": "Class",  "link": "pImage.html", "name": "pImage", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "pImage", "fromLink": "pImage.html", "link": "pImage.html#method_pImage", "name": "pImage::pImage", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pImage", "fromLink": "pImage.html", "link": "pImage.html#method_setShadow", "name": "pImage::setShadow", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pImage", "fromLink": "pImage.html", "link": "pImage.html#method_setGraphArea", "name": "pImage::setGraphArea", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pImage", "fromLink": "pImage.html", "link": "pImage.html#method_getWidth", "name": "pImage::getWidth", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pImage", "fromLink": "pImage.html", "link": "pImage.html#method_getHeight", "name": "pImage::getHeight", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pImage", "fromLink": "pImage.html", "link": "pImage.html#method_render", "name": "pImage::render", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pImage", "fromLink": "pImage.html", "link": "pImage.html#method_stroke", "name": "pImage::stroke", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pImage", "fromLink": "pImage.html", "link": "pImage.html#method_autoOutput", "name": "pImage::autoOutput", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pImage", "fromLink": "pImage.html", "link": "pImage.html#method_getLength", "name": "pImage::getLength", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pImage", "fromLink": "pImage.html", "link": "pImage.html#method_getAngle", "name": "pImage::getAngle", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pImage", "fromLink": "pImage.html", "link": "pImage.html#method_getTextBox_deprecated", "name": "pImage::getTextBox_deprecated", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pImage", "fromLink": "pImage.html", "link": "pImage.html#method_getTextBox", "name": "pImage::getTextBox", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pImage", "fromLink": "pImage.html", "link": "pImage.html#method_setFontProperties", "name": "pImage::setFontProperties", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pImage", "fromLink": "pImage.html", "link": "pImage.html#method_getFirstDecimal", "name": "pImage::getFirstDecimal", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pImage", "fromLink": "pImage.html", "link": "pImage.html#method_setDataSet", "name": "pImage::setDataSet", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pImage", "fromLink": "pImage.html", "link": "pImage.html#method_printDataSet", "name": "pImage::printDataSet", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pImage", "fromLink": "pImage.html", "link": "pImage.html#method_initialiseImageMap", "name": "pImage::initialiseImageMap", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pImage", "fromLink": "pImage.html", "link": "pImage.html#method_addToImageMap", "name": "pImage::addToImageMap", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pImage", "fromLink": "pImage.html", "link": "pImage.html#method_removeVOIDFromArray", "name": "pImage::removeVOIDFromArray", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pImage", "fromLink": "pImage.html", "link": "pImage.html#method_replaceImageMapTitle", "name": "pImage::replaceImageMapTitle", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pImage", "fromLink": "pImage.html", "link": "pImage.html#method_replaceImageMapValues", "name": "pImage::replaceImageMapValues", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pImage", "fromLink": "pImage.html", "link": "pImage.html#method_dumpImageMap", "name": "pImage::dumpImageMap", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pImage", "fromLink": "pImage.html", "link": "pImage.html#method_toHTMLColor", "name": "pImage::toHTMLColor", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pImage", "fromLink": "pImage.html", "link": "pImage.html#method_reversePlots", "name": "pImage::reversePlots", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pImage", "fromLink": "pImage.html", "link": "pImage.html#method_drawAreaMirror", "name": "pImage::drawAreaMirror", "doc": "&quot;&quot;"},
            
            {"type": "Class",  "link": "pIndicator.html", "name": "pIndicator", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "pIndicator", "fromLink": "pIndicator.html", "link": "pIndicator.html#method_pIndicator", "name": "pIndicator::pIndicator", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pIndicator", "fromLink": "pIndicator.html", "link": "pIndicator.html#method_draw", "name": "pIndicator::draw", "doc": "&quot;&quot;"},
            
            {"type": "Class",  "link": "pPie.html", "name": "pPie", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "pPie", "fromLink": "pPie.html", "link": "pPie.html#method_pPie", "name": "pPie::pPie", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pPie", "fromLink": "pPie.html", "link": "pPie.html#method_draw2DPie", "name": "pPie::draw2DPie", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pPie", "fromLink": "pPie.html", "link": "pPie.html#method_draw3DPie", "name": "pPie::draw3DPie", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pPie", "fromLink": "pPie.html", "link": "pPie.html#method_drawPieLegend", "name": "pPie::drawPieLegend", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pPie", "fromLink": "pPie.html", "link": "pPie.html#method_setSliceColor", "name": "pPie::setSliceColor", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pPie", "fromLink": "pPie.html", "link": "pPie.html#method_writePieLabel", "name": "pPie::writePieLabel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pPie", "fromLink": "pPie.html", "link": "pPie.html#method_shift", "name": "pPie::shift", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pPie", "fromLink": "pPie.html", "link": "pPie.html#method_writeShiftedLabels", "name": "pPie::writeShiftedLabels", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pPie", "fromLink": "pPie.html", "link": "pPie.html#method_draw2DRing", "name": "pPie::draw2DRing", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pPie", "fromLink": "pPie.html", "link": "pPie.html#method_draw3DRing", "name": "pPie::draw3DRing", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pPie", "fromLink": "pPie.html", "link": "pPie.html#method_arraySerialize", "name": "pPie::arraySerialize", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pPie", "fromLink": "pPie.html", "link": "pPie.html#method_arrayReverse", "name": "pPie::arrayReverse", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pPie", "fromLink": "pPie.html", "link": "pPie.html#method_clean0Values", "name": "pPie::clean0Values", "doc": "&quot;&quot;"},
            
            {"type": "Class",  "link": "pRadar.html", "name": "pRadar", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "pRadar", "fromLink": "pRadar.html", "link": "pRadar.html#method_pRadar", "name": "pRadar::pRadar", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pRadar", "fromLink": "pRadar.html", "link": "pRadar.html#method_drawRadar", "name": "pRadar::drawRadar", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pRadar", "fromLink": "pRadar.html", "link": "pRadar.html#method_drawPolar", "name": "pRadar::drawPolar", "doc": "&quot;&quot;"},
            
            {"type": "Class",  "link": "pScatter.html", "name": "pScatter", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "pScatter", "fromLink": "pScatter.html", "link": "pScatter.html#method_pScatter", "name": "pScatter::pScatter", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pScatter", "fromLink": "pScatter.html", "link": "pScatter.html#method_drawScatterScale", "name": "pScatter::drawScatterScale", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pScatter", "fromLink": "pScatter.html", "link": "pScatter.html#method_drawScatterPlotChart", "name": "pScatter::drawScatterPlotChart", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pScatter", "fromLink": "pScatter.html", "link": "pScatter.html#method_drawScatterLineChart", "name": "pScatter::drawScatterLineChart", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pScatter", "fromLink": "pScatter.html", "link": "pScatter.html#method_drawScatterSplineChart", "name": "pScatter::drawScatterSplineChart", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pScatter", "fromLink": "pScatter.html", "link": "pScatter.html#method_getPosArray", "name": "pScatter::getPosArray", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pScatter", "fromLink": "pScatter.html", "link": "pScatter.html#method_drawScatterLegend", "name": "pScatter::drawScatterLegend", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pScatter", "fromLink": "pScatter.html", "link": "pScatter.html#method_getScatterLegendSize", "name": "pScatter::getScatterLegendSize", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pScatter", "fromLink": "pScatter.html", "link": "pScatter.html#method_drawScatterBestFit", "name": "pScatter::drawScatterBestFit", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pScatter", "fromLink": "pScatter.html", "link": "pScatter.html#method_writeScatterLabel", "name": "pScatter::writeScatterLabel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pScatter", "fromLink": "pScatter.html", "link": "pScatter.html#method_drawScatterThreshold", "name": "pScatter::drawScatterThreshold", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pScatter", "fromLink": "pScatter.html", "link": "pScatter.html#method_drawScatterThresholdArea", "name": "pScatter::drawScatterThresholdArea", "doc": "&quot;&quot;"},
            
            {"type": "Class",  "link": "pSplit.html", "name": "pSplit", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "pSplit", "fromLink": "pSplit.html", "link": "pSplit.html#method_pSplit", "name": "pSplit::pSplit", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pSplit", "fromLink": "pSplit.html", "link": "pSplit.html#method_drawSplitPath", "name": "pSplit::drawSplitPath", "doc": "&quot;&quot;"},
            
            {"type": "Class",  "link": "pSpring.html", "name": "pSpring", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "pSpring", "fromLink": "pSpring.html", "link": "pSpring.html#method_pSpring", "name": "pSpring::pSpring", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pSpring", "fromLink": "pSpring.html", "link": "pSpring.html#method_setLinkDefaults", "name": "pSpring::setLinkDefaults", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pSpring", "fromLink": "pSpring.html", "link": "pSpring.html#method_setLabelsSettings", "name": "pSpring::setLabelsSettings", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pSpring", "fromLink": "pSpring.html", "link": "pSpring.html#method_autoFreeZone", "name": "pSpring::autoFreeZone", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pSpring", "fromLink": "pSpring.html", "link": "pSpring.html#method_linkProperties", "name": "pSpring::linkProperties", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pSpring", "fromLink": "pSpring.html", "link": "pSpring.html#method_setNodeDefaults", "name": "pSpring::setNodeDefaults", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pSpring", "fromLink": "pSpring.html", "link": "pSpring.html#method_addNode", "name": "pSpring::addNode", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pSpring", "fromLink": "pSpring.html", "link": "pSpring.html#method_setNodesColor", "name": "pSpring::setNodesColor", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pSpring", "fromLink": "pSpring.html", "link": "pSpring.html#method_dumpNodes", "name": "pSpring::dumpNodes", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pSpring", "fromLink": "pSpring.html", "link": "pSpring.html#method_checkConnection", "name": "pSpring::checkConnection", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pSpring", "fromLink": "pSpring.html", "link": "pSpring.html#method_getMedianOffset", "name": "pSpring::getMedianOffset", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pSpring", "fromLink": "pSpring.html", "link": "pSpring.html#method_getBiggestPartner", "name": "pSpring::getBiggestPartner", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pSpring", "fromLink": "pSpring.html", "link": "pSpring.html#method_firstPass", "name": "pSpring::firstPass", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pSpring", "fromLink": "pSpring.html", "link": "pSpring.html#method_doPass", "name": "pSpring::doPass", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pSpring", "fromLink": "pSpring.html", "link": "pSpring.html#method_lastPass", "name": "pSpring::lastPass", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pSpring", "fromLink": "pSpring.html", "link": "pSpring.html#method_center", "name": "pSpring::center", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pSpring", "fromLink": "pSpring.html", "link": "pSpring.html#method_drawSpring", "name": "pSpring::drawSpring", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pSpring", "fromLink": "pSpring.html", "link": "pSpring.html#method_getDistance", "name": "pSpring::getDistance", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pSpring", "fromLink": "pSpring.html", "link": "pSpring.html#method_getAngle", "name": "pSpring::getAngle", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pSpring", "fromLink": "pSpring.html", "link": "pSpring.html#method_intersect", "name": "pSpring::intersect", "doc": "&quot;&quot;"},
            
            {"type": "Class",  "link": "pStock.html", "name": "pStock", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "pStock", "fromLink": "pStock.html", "link": "pStock.html#method_pStock", "name": "pStock::pStock", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pStock", "fromLink": "pStock.html", "link": "pStock.html#method_drawStockChart", "name": "pStock::drawStockChart", "doc": "&quot;&quot;"},
            
            {"type": "Class",  "link": "pSurface.html", "name": "pSurface", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "pSurface", "fromLink": "pSurface.html", "link": "pSurface.html#method_pSurface", "name": "pSurface::pSurface", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pSurface", "fromLink": "pSurface.html", "link": "pSurface.html#method_setGrid", "name": "pSurface::setGrid", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pSurface", "fromLink": "pSurface.html", "link": "pSurface.html#method_addPoint", "name": "pSurface::addPoint", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pSurface", "fromLink": "pSurface.html", "link": "pSurface.html#method_writeXLabels", "name": "pSurface::writeXLabels", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pSurface", "fromLink": "pSurface.html", "link": "pSurface.html#method_writeYLabels", "name": "pSurface::writeYLabels", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pSurface", "fromLink": "pSurface.html", "link": "pSurface.html#method_drawContour", "name": "pSurface::drawContour", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pSurface", "fromLink": "pSurface.html", "link": "pSurface.html#method_drawSurface", "name": "pSurface::drawSurface", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pSurface", "fromLink": "pSurface.html", "link": "pSurface.html#method_computeMissing", "name": "pSurface::computeMissing", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "pSurface", "fromLink": "pSurface.html", "link": "pSurface.html#method_getNearestNeighbor", "name": "pSurface::getNearestNeighbor", "doc": "&quot;&quot;"},
            
            
                                        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if "::" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\') > -1) {
            tokens = tokens.concat(term.split('\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string "search" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            return term.replace(/<(?:.|\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return $.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    $(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = $('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);
        Sami.injectApiTree($('#api-tree'));
    });

    return root.Sami;
})(window);

$(function() {

    // Enable the version switcher
    $('#version-switcher').change(function() {
        window.location = $(this).val()
    });

    
        // Toggle left-nav divs on click
        $('#api-tree .hd span').click(function() {
            $(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = $('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = $('#api-tree');
            var node = $('#api-tree li[data-name="' + expected + '"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    
    
        var form = $('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                $('#search-form').submit();
                return true;
            }
        });

    
});


