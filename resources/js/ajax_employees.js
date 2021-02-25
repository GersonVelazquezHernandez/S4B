EventListeners();
function EventListeners(){
    if(document.querySelectorAll('.btn-borrar')){
      const btns_borrar = document.querySelectorAll(".btn-borrar");
      for (let i = 0;i<btns_borrar.length;i++){
        btns_borrar[i].addEventListener('click', borrarRegistro);
      }
    }

}
function borrarRegistro(){
    //console.log(this.getAttribute('id'));
    let url_id = this.getAttribute('id'), token = document.querySelector('input[name="_token"]').value;
    //console.log($(this).parent().parent().remove());
    $.ajax({
      type: 'DELETE',
      url: `http://localhost/S4B/public/employees/${url_id}`,
      data: {"id":url_id, "_token": token},
      success: function (data) {
        console.log(data,"Registro borrado!");
        $(`#${url_id}`).parent().parent().remove();
        toastr.options ={
          "closeButton" : true,
          "positionClass": "toast-top-center",
          "progressBar" : true
        }
      toastr.success("Se ha eliminado correctamente al empleado.");
      },
      error: function (data) {
        console.error('Error:', data);
      }
    });
  }