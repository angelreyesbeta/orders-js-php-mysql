// Example starter JavaScript for disabling form submissions if there are invalid fields
let valPagarTotal=0;
let cantidad=0;
let valorU=15000;
let add;
let catidadEstimada=0;

function init(){

  
ConsultStock();

}

function mensaje(){
  alert('estamos probando');
}

function fecha()
{
  
var fechaActual=new Date();
  

  mesActual=fechaActual.getMonth();
  diaActual=fechaActual.getDay();
  diamesActual=fechaActual.getDate();
  añoActual=fechaActual.getFullYear();

  tiempoHora=fechaActual.getHours();
  tiempoMinuto=fechaActual.getMinutes();
  tiempoSegundos=fechaActual.getSeconds();
  mesActual=mesActual+1;

  mesActual=(mesActual<10)?"0"+mesActual:mesActual;
  diamesActual=(diamesActual<10)?"0"+diamesActual:diamesActual;

  var fechaH="";
  fechaH=añoActual+"-"+mesActual+"-"+diamesActual+" "+tiempoHora+":"+tiempoMinuto+":"+tiempoSegundos;
  $("#fechahora").val(fechaH);
  //$("#fechahora2").val(fechaH);
  //alert(fechaH);
  //$("#txtfechahora").val(fechaH);
  //document.getElementById("fechahora").innerHTML=fechaH;

  
}



function agregar(){

  catidadEstimada=document.getElementById("idCantidadDisponible").innerHTML;

  
   
  add=document.getElementById("idcantidad").innerHTML;
  add++;

  if(add>catidadEstimada){

    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'La cantidad que solicitas supera la disponibilidad de platos existentes'
      }) 

  }else{
    document.getElementById("idcantidad").innerHTML=add;

    valPagarTotal=valorU*add
  
    document.getElementById("idValPagar").innerHTML='$ '+valPagarTotal;
    document.getElementById("idbtn").innerHTML='<button id="btnValidata" class="btn btn-outline-primary btn-lg btn-block mb-3" onclick="validarForm()" type="button">'+
    '<div class="row">'+
      '<div class="col-6" align="right">'+
        'Confirmar'+
      '</div>'+
      '<div class="col-6" align="right"> $ '+
        valPagarTotal+
      '</div>'+
    '</div>'+
  '</button>';
  $("#txtCantidad").val(add);
  $("#txtValorTotal").val(valPagarTotal);

  }

 

  /*$.post("./php/agregar.php?op=agregar", {variable:variable},function(data, status)
  {

    add=document.getElementById("idcantidad").innerHTML;


  })*/


}
function restar(){

  add=document.getElementById("idcantidad").innerHTML;


  if(add>0){
    
  add--;
  document.getElementById("idcantidad").innerHTML=add;

  valPagarTotal=valorU*add

  document.getElementById("idValPagar").innerHTML='$ '+valPagarTotal;
  document.getElementById("idbtn").innerHTML='<button id="btnValidata" class="btn btn-outline-primary btn-lg btn-block mb-3" onclick="validarForm()" type="button">'+
  '<div class="row">'+
    '<div class="col-6" align="right">'+
      'Confirmar'+
    '</div>'+
    '<div class="col-6" align="right"> $'+
      valPagarTotal+
    '</div>'+
  '</div>'+
'</button>';
$("#txtCantidad").val(add);
$("#txtValorTotal").val(valPagarTotal);

  }if(add<1){
    document.getElementById("idbtn").innerHTML='';
  }
  

  /*$.post("./php/agregar.php?op=agregar", {variable:variable},function(data, status)
  {

    add=document.getElementById("idcantidad").innerHTML;


  })*/


}

function validarForm(){
  

  //fecha();

  
  
  var name,phone,address,algoAdi,exprecion;

  exprecion=/[a-z]/;

  name=document.getElementById("txtNameCompleto").value;
  phone=document.getElementById("txtPhone").value;
  address=document.getElementById("txtAddress").value;
  algoAdi=document.getElementById("txtAddicional").value;

  if(name===""||phone==="" || address==="")
  {
      
      Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Todos los campos (*) son obligatorios!'
      })    
  }
  else if(isNaN(phone)){
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'El número de telefono que ingresaste no es valido'
      })  

  }else if(phone.length>10 || phone.length<10){
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Ingresa un número de telefono valido'
      })  
  }else if(address.length<6){
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Ingresa Una direccion mucho mas detallada'
      })  
  }else if(name.length<2 ){
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Ingresa un nombre correcto'
      })  
  }else if(name.length>50){
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Tu Nombre esta muy largo'
      })  
  }
  else if(!exprecion.test(name)){
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Está incorrecto este nombre'
      })  
  }else{
    
    saveOrder();
  
    
  }
}



function limpiarInputs(){

  $("#txtNameCompleto").val('');
  $("#txtPhone").val('');
  $("#txtAddress").val('');  
  $("#txtAddicional").val('');
  document.getElementById("idcantidad").innerHTML=0;
  valPagarTotal=0;
  document.getElementById("idValPagar").innerHTML='$. '+valPagarTotal;
  document.getElementById("idbtn").innerHTML='';
  ConsultStock();


}

function saveOrder(){
  fecha();
  $("#txtValorU").val(valorU);
  var formData = new FormData($("#frmServicio")[0]);

    $.ajax({
      url: "requestOrder.php?op=saveOrder",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function(){
          //document.getElementById("idLoandig").style.display="block";
          document.getElementById("idbtn").innerHTML='<button class="btn btn-outline-primary btn-lg btn-block" type="button" disabled>'+
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+
             'Loading...'+
          '</button>';
      },
        success: function(datos)
        { 

         

          if(datos!="e"){

           if(datos)
             {
                Swal.fire({
                icon: 'success',
                title: 'Tu orden ha sido enviada',
                text: 'Te contactaremos al número celular que ingresaste. ¡Gracias!'
                });  
             
                limpiarInputs();  
                
                  
             }  
            else
            {
              Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Algo salio mal, intentalo más tarde'
              });
              limpiarInputs();               
                
            } 

          }else{
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'La cantidad solicitada supera la disponibilidad de platos disponible'
              });
              document.getElementById("idcantidad").innerHTML=0;
              valPagarTotal=0;
              document.getElementById("idValPagar").innerHTML='$. '+valPagarTotal;
              document.getElementById("idbtn").innerHTML='';
              ConsultStock();
          }

           
           // alert(datos);
        }

    });
    
}


function ConsultStock(){ 
  nombreusuariocompleto='Angel';
  const parametros={
    
    "idServicio":''+nombreusuariocompleto+''
    
};
  
  $.ajax({
      url: "requestOrder.php?op=ConsultStock",
      type: "POST",
      beforeSend: function(){
        //document.getElementById("idLoandig").style.display="block";
      
       document.getElementById("idCantidadDisponible").innerHTML="Cargando...";
    },
      success: function(datos)
      { 
        
        //document.getElementById("idLoandig").style.display="none";

        data = JSON.parse(datos);
         if(datos)
           {
              /* Swal.fire({
              icon: 'success',
              title: 'EXITOSO',
              text: data.cantidad
              });   */
              document.getElementById("idCantidadDisponible").innerHTML=data.cantidad;
              
                    
           }
          else
          {
            /* Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Algo salio mal, intentalo mas tarde'
            }); */
            document.getElementById("idCantidadDisponible").innerHTML="Error";            
              
          }
         // alert(datos);
      }

  });




  
  
  
}


function api(){
  $.ajax({
    url: 'http://www.simi-api.com/ApiSimiweb/response/v2.1.1/filtroInmueble/limite/1/total/10/departamento/0/ciudad/0/zona/0/barrio/0/tipoInm/0/tipOper/0/areamin/0/areamax/0/valmin/0/valmax/0/campo/0/order/0/banios/0/alcobas/0/garajes/0/sede/0/usuario/0',
     type: 'GET',
     beforeSend: function (xhr) {
     xhr.setRequestHeader(
        'Authorization',
        'Basic ' + btoa('Authorization:i1h5nBba9TJ2Sa4v00MPziuQskPA64SPtpLAGnq8-864'));
     },
     'dataType': "json",
     success:function(response)
     {
        console.log(response);
     
     }
           
   });
}




init();