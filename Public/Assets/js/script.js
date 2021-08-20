//function procedimento para validar campos(inputs) de formulário de adição de fotos
function validaFormAddFoto() {
  let titulo = addFoto.titulo.value;
  let autor = addFoto.autor.value;
  let foto = addFoto.foto.value;
  let categoria = addFoto.categoria.value;
  let descricao = addFoto.descricao.value;

  if(titulo == "") {
    window.alert("Por favor informe um titulo valido");
    return false;
  }

  if(autor == "") {
    window.alert("Por favor informe o autor");
    return false;
  }

  if(foto == "") {
    window.alert("Por favor selecione um arquivo condizente");
    return false;
  }

  if(categoria == "") {
    window.alert("Por favor selecione uma categoria condizente");
    return false;
  }

  if(descricao == "") {
    window.alert("Por favor informe uma descrição condizente");
    return false;
  }
}
