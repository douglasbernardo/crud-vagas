

function validar()
{

  var titulo = document.getElementById("titulo")
  var descricao = document.getElementById("descricao")

  if (titulo.value && descricao.value  == "") {
        alert("Preencha os dados corretamente");

        // Deixa o input com o focus
        titulo.focus()
        descricao.focus()
        // retorna a função e não olha as outras linhas
    break
    }
    // verificar se o titulo está vazio
    if (titulo.value == "") {
        alert("Titulo não informado")

        // Deixa o input com o focus
        titulo.focus()
        // retorna a função e não olha as outras linhas
        return
    }
    if (descricao.value == "") {
        alert("Descrição não informada")
        descricao.focus()
        return
    }

    if (descricao.value.length < 10) {
        alert("Descrição deve conter mais de 10 caracteres")
        descricao.focus()
        return
    }
}
