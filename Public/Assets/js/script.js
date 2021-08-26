//function procedimento para validar campos(input) de formulário de cadastro de usuário
function validaFormCadastroUser() {
  let nome = cadastroUser.nome.value;
  let email = cadastroUser.email.value;
  let senha = cadastroUser.senha.value;
  let confirmar_senha = cadastroUser.confirm_senha.value;

  if(nome == "") {
    window.alert("por favor informe um nome valido");
    return false;
  }

  if(email == "" || email.indexOf("@") == -1) {
    window.alert("por favor informe um endereço de e-mail valido");
    return false;
  }

  if(senha == "" || senha.length < 5) {
    window.alert("por favor informe uma senha valida contendo no mínimo 5 caracteres");
    return false;
  }

  if(confirmar_senha == "") {
    window.alert("por favor confirme sua senha a ser definida");
    return false;
  }
}
//function procedimento para validar campos(inputs) de formulário de login de usuário
function validaFormLogin() {
  let email = login.email.value;
  let senha = login.email.value;

  if(email == "" || email.indexOf("@") == -1) {
    window.alert("por favor informe um endereço de e-mail valido");
    return false;
  }

  if(senha == "") {
    window.alert("por favor informe uma senha valida");
    return false;
  }
}

//define function para validar campos(input) de formulário de atualização de senha de usuário
function validarFormUpdateSenha() {
  let email = esqueciSenha.email.value;
  let nova_senha = esqueciSenha.nova_senha.value;

  if(email == "" || email.indexOf("@") == -1) {
    window.alert("por favor informe um endereço de e-mail valido");
    return false;
  }

  if(senha == "") {
    window.alert("por favor informe uma senha valida contendo no mínimo 5 caracteres");
    return false;
  }
}

//function procedimento para validar campo(input) de formulário de adição de categorias
function validaFormAddCategoria() {
  let categoria = addCategoria.categoria.value;
  if(categoria == "" || categoria.length <= 3) {
    window.alert("por favor informe uma categoria contendo no mínimo 3 caracteres");
    return false;
  }
}
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
