<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP/BD - Exercício - Formulário Cadastro de Pessoa</title>
    </head>
    <body>
        <h4>Neste laboratório deve-se solicitar ao usuário os dados da pessoa, enviar para o servidor por meio do método POST e salvar no PostgreSQL.</h4>
        
        <form action="cadastro.php" method="post">
          <fieldset style="width: 40%;">
            <legend>Dados da Pessoa:</legend>
            <table style="width:100%" border="0px">
              <tr>
                <td style="width: 30%;"><label for="campo_primeiro_nome">Primeiro Nome:</label></td>
                <td><input style="width: 300px" type="text" id="campo_primeiro_nome" name="campo_primeiro_nome" maxlength="150"/></td>
              </tr>
              <tr>
                <td style="width: 30%;"><label for="campo_sobrenome">Sobrenome:</label></td>
                <td><input style="width: 250px" type="text" id="campo_sobrenome" name="campo_sobrenome" maxlength="150"/></td>
              </tr>
              <tr>
                <td style="width: 20%;"><label for="campo_email">E-Mail:</label></td>
                <td><input style="width: 250px" type="email" id="campo_email" name="campo_email" maxlength="150"/></td>
              </tr>
              <tr>
                <td style="width: 20%;"><label for="campo_cidade">Cidade:</label></td>
                <td><input style="width: 200px" type="text" id="campo_cidade" name="campo_cidade" maxlength="100"/></td>
              </tr>
              <tr>
                <td style="width: 20%;"><label for="campo_estado">Estado:</label></td>
                <td><select name="campo_estado" id="campo_estado">
                    <option value="SC">Santa Catarina</option>
                    <option value="PR">Paraná</option>
                    <option value="RS">Rio Grande do Sul</option>
                  </select>
                </td>                
              </tr>
              <tr>
                <td style="width: 20%;"><label for="campo_password">Password:</label></td>
                <td><input style="width: 100px" type="password" id="campo_password" name="campo_password" maxlength="15"/></td>
              </tr>
              <tr>
                <td colspan="2" align="left">
                  <br>
                  <input type="submit" value="Salvar">
                </td>
              </tr>
            </table>
          </fieldset>
        </form>
    </body>
</html>
