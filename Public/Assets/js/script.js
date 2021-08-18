//function procedimento para validar campos(inputs) de formulário de adição de fotos
function validaFormAddFoto() {
  let titulo = addFoto.titulo.value;
  let autor = addFoto.autor.value;
  let foto = addFoto.foto.value;
  let categoria = addFoto.categoria.value;
  let descricao = addFoto.descricao.value;

  if(titulo == "") {
    window.alert("Por favor informe um titulo valido");
    window.location.reload();
    return false;
  }else if (titulo.length <= 3) {
    window.alert("Por favor informe um titulo contendo no minimo 4 caracteres");
    window.location.reload();
    return false;
  }

  if(autor == "") {
    window.alert("Por favor informe o autor");
    window.location.reload();
    return false;
  }else if(autor.length <= 3) {
    window.alert("Por favor informe um nome de autor contendo no minimo 4 caracteres");
    window.location.reload();
    return false;
  }

  if(foto == "") {
    window.alert("Por favor selecione um arquivo condizente");
    window.location.reload();
    return false;
  }

  if(categoria == "") {
    window.alert("Por favor selecione uma categoria condizente");
    window.location.reload();
    return false;
  }

  if(descricao == "") {
    window.alert("Por favor informe uma descrição condizente");
    window.location.reload();
    return false;
  }
}
