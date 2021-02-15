<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Cofo | Pedidos</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/checkout/">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      #idCantidad{
        margin:10px;
      }

      .colors-red{
        color:#b71c1c;
      }

      textarea {
        resize: none;
      }
      
    </style>
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="">
    <div class="container">
  <div class="py-3 text-center">
 
    <img class="d-block mx-auto mb-2 " src="assets/brand/cofo.png" alt="" width="200" height="200">
  <!--<p class="lead text-warning">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>-->
  </div>

  <!--d-block mx-auto mb-4-->
    <div class="col-md-12 order-md-1 text-dark " >
      <h4 class="mb-4" align="center">Nuestro plato disponible</h4>
      <hr>
        <div class="row mb-2">
          <div class="col-lg-4 col-md-6 mb-3" >
           <img class=" d-block mx-auto rounded" src="assets/brand/arroz.jpeg" alt="Arroz" width="300" height="200">
          </div>
          <div class="col-lg-8 col-md-6">

            <h2 class="text-dark">Arroz (5 sabores) <span class="ml-5"><small><i class="fas fa-calendar fa-xs  "></i>10 DE OCTUBRE</small></span></h2>
            <p class="lead">Para este sábado 10 de octubre, te traemos un delicioso plato con variedad de sabores: verduras frescas, carne de res, carne de cerdo, pechuga de pollo, chicharrón, chorizo y una porción de ensalada.
            <h3 align="center">Domicilio GRATIS </h3>
            
          
        </div>
        
            
            
    </div>
    <hr>
          <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="row">
                  <div class="col-6 col-sm-8">
                    <h4 class="text-dark m-3">Platos disponibles</h4>
                  </div>
                  <div class="col-6 col-sm-4">
                    <h3  class="text-dark"><span id="idCantidadDisponible" class="badge badge-success m-3"></span></h3>
                  </div>
                </div>
                <!-- <div class="row">
                  <div class="col-12">
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" style="width: 80%;" >80%</div>
                    </div>
                  </div>
                </div> -->
              </div>
             
              <div class="col-md-6 col-sm-12">
                <div class="row">
                  <div class="col-6 col-sm-8">
                    <h4 class="text-dark m-3">Valor unitario</h4>
                  </div>
                  <div class="col-6 col-sm-4">
                      <h3  class="text-dark"><span class="badge badge-info m-3">$ 15.000</span></h3>
                  </div>
                </div>
              </div>

                  
          </div>
            <hr/>
            
            
            <div class="row mb-3">
              <div class="col-12 col-sm-12" align="center">
              <div class="row align-item-center justify-content-center mb-3">
                  <h5  class="text-dark" align="cenrter"> Elige la cantidad </h5>
              </div>
                <div class="row align-item-center justify-content-center">
                   <button class="btn btn-outline-danger" style="border-radius: 20%;" type="button" onclick="restar();"><h3 class="p-1">-</h3></button>
                  <h5 id="idcantidad"  class="text-dark mx-2 p-3"> 0 </h5>
                  <button class="btn btn-outline-dark " style="border-radius: 20%;" type="button" onclick="agregar();"><h3 class="p-1">+</h3></button >
                 
                </div>
                
              </div>
              <!--<div class="col-3 col-sm-3" align="left">
                  <button class="btn btn-outline-dark" style="border-radius: 20%; padding: 5px;" type="button" onclick="agregar();">+</button>
                  <button class="btn btn-outline-danger" style="border-radius: 20%; padding: 5px;" type="button" onclick="restar();">-</button>

              </div>-->
            </div>

            <div class="row">
            
              <div class="col-12 col-sm-12" align="center">
                  <h5 id="idValPagar" class="text-dark">$ 0</h5>
              </div>
              
          
            </div>
            

            <hr/>
            <form name="frmServicio" id="frmServicio" method="POST" class="needs-validation" novalidate>

            <div class="row">
              <div class="col-md-6 mb-3">
                <input type="hidden" id="txtCantidad" name="txtCantidad">
                <input type="hidden" id="txtValorTotal" name="txtValorTotal">
                <input type="hidden" id="fechahora" name="fechahora">
                <input type="hidden" id="txtValorU" name="txtValorU">
                <label for="text">Nombre completo <span class="text-muted">(*)</span></label>
                <input type="text"  class="form-control" id="txtNameCompleto" name="txtNameCompleto" placeholder="Ej. Juan Pérez Maldonado" required>
               
              </div>
              <div class="col-md-6 mb-3">
                <label for="text">Número celular <span class="text-muted">(*)</span></label>
                <input type="number" class="form-control" id="txtPhone" name="txtPhone" placeholder="Ej. 3157894565" required>
               
              </div>

              
            </div>

            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="address2">Dirección con referencias <span class="text-muted">(*)</span></label>
                
                <textarea class="form-control" name="txtAddress" id="txtAddress"  rows="3" placeholder="Ej. Calle 30 frente al parque Antonio Pérez"></textarea>
                
              </div>
            </div>

            <div class="row">
              
            <div class="col-md-12 mb-3">
              <label for="address">¿Deseas adicionar algo más a tu pedido? (Opcional)</label>
              <input type="text" class="form-control" id="txtAddicional" name="txtAddicional" placeholder="Ej. Hora de entrega.">
          
          </div>

            </div>
     
            

          <hr class="mb-4">


          <div  id="idLoandig" class="text-center mb-4" style="display: none;">
            <div class="spinner-border" role="status">
              <span class="sr-only">Loading...</span>
            </div>
          </div>

          

          

          

          <div class="mb-5" id="idbtn">

            
          </div>
          

            
            </form>


          <h3 class=" text-center text-success"><b>Gracias por elegirnos </b><i class="fas fa-heart fa-xs colors-red"></i> </h3>


          </div><!--cierre col 12 -->
            
      

          <button class="btn btn-outline-dark "  type="button" onclick="api();"><h3 class="p-1">Prueba API</h3></button >
                 
        
      
    </div> <!-- Cierre container 12 -->
  </body>
 

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2020 Betapp</p>
    <ul class="list-inline">
     <!-- <li class="list-inline-item"><a href="#">Contact</a></li>-->
    </ul>
  </footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>      
<script src="./jquery/dist/jquery.min.js"></script>
<script src="./jquery/dist/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script src="form-validation.js"></script></body>     
        <!--cierre col 12 -->





</html>




















<!-- <div class="row">
          <div class="col-md-5 mb-3">
            <label for="country">Country</label>
            <select class="custom-select d-block w-100" id="country" required>
              <option value="">Choose...</option>
              <option>United States</option>
            </select>
            <div class="invalid-feedback">
              Please select a valid country.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="state">State</label>
            <select class="custom-select d-block w-100" id="state" required>
              <option value="">Choose...</option>
              <option>California</option>
            </select>
            <div class="invalid-feedback">
              Please provide a valid state.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="zip">Zip</label>
            <input type="text" class="form-control" id="zip" placeholder="" required>
            <div class="invalid-feedback">
              Zip code required.
            </div>
          </div>
        </div> -->
