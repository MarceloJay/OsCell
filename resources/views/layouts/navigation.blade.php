<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Manager</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Dashboard</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Order de Serviços</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Criar Order</a>
                        </li>
                        <li>
                            <a href="#">Editar Order</a>
                        </li>
                        <li>
                            <a href="#">Finalizar Order</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Peças</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Estoque de Peças</a>
                        </li>
                        <li>
                            <a href="#">Cadastrar Peças</a>
                        </li>
                        <li>
                            <a href="#">Pedido de Peças</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Taxa de Serviços</a>
                </li>
                <li>
                    <a href="#">Clientes</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="" class="download">Configuração da Impressão</a>
                </li>
                <li>
                    <a href="" class="article">Finalizar e Imprimir Order</a>
                </li>
            </ul>
        </nav>        
    </div>
</div>
<style>

    a,
    a:hover,
    a:focus {
        color: inherit;
        text-decoration: none;
        transition: all 0.3s;
    }

    .navbar {
        background: var(--background-default);
        border-radius: 0;
        margin-bottom: -20px;
        box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        
    }

    .navbar-btn {
        box-shadow: none;
        outline: none !important;
        border: none;
    }

    .line {
        width: 100%;
        height: 1px;
        border-bottom: 1px dashed #ddd;
        margin: 40px 0;
    }

    /* ---------------------------------------------------
        SIDEBAR STYLE
    ----------------------------------------------------- */

    .wrapper {
        width: 100%;
    }

    #sidebar {
        margin-left: 15px;
        min-width: 350px;
        max-width: 350px;
        min-height: 800px;
        max-height: 800px;
        background: #001f36;
        color: #fff;
        transition: all 0.3s;
    }

    #sidebar.active {
        margin-left: -250px;
    }

    #sidebar .sidebar-header {
        text-align: center;
        padding: 20px;
        background: #1c5560;
    }

    #sidebar ul.components {
        padding: 20px 0;
        border-bottom: 1px solid #47748b;
    }

    #sidebar ul p {
        color: #fff;
        padding: 10px;
        margin-left: 15px;
        margin-right: 15px;
    }

    #sidebar ul li a {
        padding: 10px;
        font-size: 1.1em;
        display: block;
        margin-left: 15px;
        margin-right: 15px;
    }

    #sidebar ul li a:hover {
        color: #7386D5;
        background: #fff;
    }

    #sidebar ul li.active>a,
    a[aria-expanded="true"] {
        color: #fff;
        background: #1c5560;
    }

    a[data-toggle="collapse"] {
        position: relative;
    }

    .dropdown-toggle::after {
        display: block;
        position: absolute;
        top: 50%;
        right: 20px;
        transform: translateY(-50%);
    }

    ul ul a {
        font-size: 0.9em !important;
        padding-left: 30px !important;
        background: #1c5560;
    }

    ul.CTAs {     
        padding: 20px;
        position:absolute; 
        top:80%;
        left:10%;
        transform: translate(-50%, -50%);
    }

    ul.CTAs a {
        text-align: center;
        font-size: 0.9em !important;
        display: block;
        border-radius: 5px;
        margin-bottom: 15px;
        min-width: 250px;
        max-width: 250px;
    }

    a.download {
        background: #fff;
        color: #7386D5;
    }

    a.article,
    a.article:hover {
        background: #1c5560 !important;
        color: #fff !important;
    }

    /* ---------------------------------------------------
        CONTENT STYLE
    ----------------------------------------------------- */

    #content {
        width: 100%;
        padding: 20px;
        min-height: 100vh;
        transition: all 0.3s;
    }

    /* ---------------------------------------------------
        MEDIAQUERIES
    ----------------------------------------------------- */

    @media (max-width: 768px) {
        #sidebar {
            margin-left: -250px;
        }
        #sidebar.active {
            margin-left: 0;
        }
        #sidebarCollapse span {
            display: none;
        }
    }
</style>   
<script>
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script> 