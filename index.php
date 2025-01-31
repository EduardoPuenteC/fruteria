<style>
    nav {
    &.primary-navigation {
      margin: 0 auto;
      display: block;
    
      padding: 12px 0 0 0;  
      text-align: center;
      font-size: 16px;
  
      ul li {
        list-style: none;
        margin: 0 auto;
        border-left: 2px solid #3ca0e7;
        display: inline-block;
        padding: 0 30px;
        position: relative;
        text-decoration: none;
        text-align: center;
        font-family: arvo;
      }
  
      li a {
        color: black;
      }
  
      li a:hover {
        color: #3ca0e7;
      }
  
      li:hover {
        cursor: pointer;
      }
  
      ul li ul {
        visibility: hidden;
        opacity: 0;
        position: absolute;
  padding-left: 0;
        left: 0;
        display: none;
        background: white;
      }
  
      ul li:hover > ul,
      ul li ul:hover {
        visibility: visible;
        opacity: 1;
        display: block;
        min-width: 250px;
        text-align: left;
        padding-top: 20px;
        box-shadow: 0px 3px 5px -1px #ccc;
      }
  
      ul li ul li {
        clear: both;
        width: 100%;
        text-align: left;
        margin-bottom: 20px;
        border-style: none;
      }
  
      ul li ul li a:hover {
        padding-left: 10px;
        border-left: 2px solid #3ca0e7;
        transition: all 0.3s ease;
      }
    }
  }
  
  a {
  
      text-decoration: none;
  
      &:hover {
          color: #3CA0E7;
      }
   
  }
  
   ul li ul li a { transition: all 0.5s ease; }
  
  
</style>    
<link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet">

<nav role="navigation" class="primary-navigation">
  <ul>
    <li><a href="#">Productos &dtrif;</a>
      <ul class="dropdown">
        <li><a href="php/agregar_productos.php">Nuevo Producto</a></li>
        <li><a href="php/listar_productos.php">Listar Productos</a></li>
      </ul>
    </li>
    <li><a href="#">Usuarios &dtrif;</a>
      <ul class="dropdown">
        <li><a href="php/crear_usuario.php">Nuevo Usuario</a></li>
        <li><a href="php/listar_usuarios.php">Listar Usuarios</a></li>
      </ul>
    </li>
    <li><a href="#">Ventas &dtrif;</a>
        <ul class="dropdown">
            <li><a href="php/registrar_ventas.php">Nueva Venta</a></li>
            <li><a href="php/listar_ventas.php">Listar Ventas</a></li>
        </ul>
    </li>
    <li><a href="#">Compras &dtrif;</a>
        <ul class="dropdown">
            <li><a href="php/registrar_compras.php">Registrar Compra</a></li>
            <li><a href="php/listar_compras.php">Listar Compras </a></li>
        </ul>
    </li>
  </ul>
</nav>