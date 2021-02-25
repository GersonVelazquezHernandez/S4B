EventListeners();
function EventListeners(){
    if(document.querySelector('#formulario')){
    document.querySelector('#formulario').addEventListener('submit', validarRegistro);
    }
    if(document.querySelectorAll('.box')){
      const btns_borrar = document.querySelectorAll(".btn-borrar");
      for (let i = 0;i<btns_borrar.length;i++){
        btns_borrar[i].addEventListener('click', borrarRegistro);
      }
    }

}
function validarRegistro(e){
  e.preventDefault();  
  console.log(this.getAttribute("action"));
  const nombre = document.querySelector('#inputNombre').value,
        email = document.querySelector('#inputEmail').value,
        website = document.querySelector('#inputWebSite').value;

  if(nombre === '' || email === '' || website === ''){
    toastr.options ={
      "closeButton" : true,
      "positionClass": "toast-top-center",
      "progressBar" : true
    }
  toastr.error("Todos los campos son obligatorios");
  }else{
      const company = new FormData(this);
      company.append('_token', document.querySelector('input[name="_token"]').value);
      console.log(this.getAttribute('method'));
      /*company.append('nombre', nombre);
      company.append('email', email);
      company.append('website', website);*/
      /*$.ajaxSetup({
        beforeSend:function(xhr){
            xhr.setRequestHeader('Csrf-Token',document.querySelector('input[name="_token"]').value);
        }
      });*/
      $.ajax({
        url: this.getAttribute("action"),
        data: company,
        dataType:'JSON',
        processData: false,
        contentType: false,
        method: this.getAttribute("method"),
        success: function(respuesta){
          console.log(respuesta)
          console.log(respuesta['respuesa']);
          if(respuesta['respuesa'] === 'correcto'){
            toastr.options ={
              "closeButton" : true,
              "positionClass": "toast-top-center",
              "progressBar" : true
            }
          toastr.success("Se añadió correctamente la compañia.");
          location.href = "http://localhost/S4B/public/companies/";
          }
        }
      });
    }
  }

  function borrarRegistro(){
    //console.log(this.getAttribute('id'));
    let url_id = this.getAttribute('id'), token = document.querySelector('input[name="_token"]').value;
    //console.log($(this).parent().parent().remove());
    $.ajax({
      type: 'DELETE',
      url: `http://localhost/S4B/public/companies/${url_id}`,
      data: {"id":url_id, "_token": token},
      success: function (data) {
        console.log(data,"Registro borrado!");
        $(`#${url_id}`).parent().parent().remove();
        toastr.options ={
          "closeButton" : true,
          "positionClass": "toast-top-center",
          "progressBar" : true
        }
      toastr.success("Se ha eliminado correctamente la compañía.");
      },
      error: function (data) {
        console.error('Error:', data);
      }
    });
  }