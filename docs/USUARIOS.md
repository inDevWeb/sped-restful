# Sped-RestFul

## Gestão de Usuários

Os usuários são definidos como:
- Administrador (apenas um o primeiro a ser registrado, seu id deve ser 1)
- Comuns, estes usuários poderão apenas acessar os dados relativos a seus grupos de dados.

### Administrador
Esiste apenas um administrador. E seu registro não pode ser removido, apenas editado.
O primeiro usuário cadastrado no sistema será sempre o administrador, ou seja "user.id = 1". Esse será o "superusuário" com poderes totais sobre os cadastros do sistema. O administrador terá sempre acesso total a todas as operações do sistema e é ele quem deve incluir um novo usuário no sistema.

Esse novo usuário criado pelo administrador, não necessita ter nenhum vinculo com emitente, então caso tenha sido criado sem vinculos, sua primeira e obrigatória tarefa será incluir um emitente para si mesmo.

### Comuns
Os usuários comuns sempre estarão vinculados a pelo menos um emitente.
O usuário commum pode incluir outros usuários que serão vinculados aos mesmos emitentes que o usuário que os criou.

Este usuário pode criar novos emitentes, que automaticamente, serão vinculados a ele e a todos os outros usuários pertencentes a esse grupo.

## Operações com usuários

## Inclusão
O Administrador é o único que pode criar usuários, sem a necessidade de vinculação a um emitente. E nesse caso como já mensionado, esse usuário terá que registrar um emitente como sua primeira e obrigatória tarefa, pois nenhuma outra operação poderá ser realizada até que um emitente seja vinculado a esse usuário.

Já os usuários comuns poderão incluir outros que farão parte automaticamente de seu grupo.

**POST:** http://<dominio>/user


## Edição
O Administrador poderá editar os dados de qualuqer usuário do sistema.
Já o usuário comum somente poderá editar os seus proprios dados. É vetado o acesso aos dados de outros usuários para qualquer participante, exceto ao Administrador.

**PUT:** http://<dominio>/user/$id


## Deleção
A deleção, feita por usuários comuns, somente é permitida para aqueles considerados como "participantes" de um determinado grupo e pelo menos um usuário deverá ser preservado caso hajam emitentes cadastrados para os mesmos. Se não houverem emitentes cadastrados o usuário é livre para se auto remover.

Apenas o Administrador porderá remover todos os usuários de um determinado grupo, se houverem emitentes registrados para os mesmos.

O Administrador não pode ser removido !!

**DELETE:** http://<dominio>/user/$id


