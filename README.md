<h1>Gerenciador de Tarefas  - Projeto em Andamento</h1>
<a href="http://valdiney.meximas.com/tarefas/index.php" target="_blanck">Acesso ao Sistema</a>
<p>
	Quando se está envolvido na construção de algo é corriqueira a necessidade de armazenar em um local de forma organizada todas as tarefas que devem ser feitas, as que estão sendo feitas e as que já foram concluídas. Sendo que em muitos dos casos precisamos compartilhar esses documentos com outros integrantes da equipe. Mas e agora? Como podemos fazer isso?
</p>

<p>
	Existem varias formas... Algumas pessoas escrevem em cadernos, outras no bloco de notas do computador, outras mandam tudo isso via email, outras usam algum software de gerenciamento de projetos, ou seja, varias formas podem ser tomadas para sanar esse tipo de necessidade.  
</p>

<p>
	De acordo com as expressões acima o sistema não se trata de um gerenciador de projetos e sim um gerenciador de tarefas podendo ser atribuída a qualquer usuário cadastrado no sistema. 
</p>

<p>
   O sistema destaca a situação atual da tarefa, ou seja, se está em estado pendente, sendo feito, ou se já foi concluída... 
</p>

<p>
	Bom, basicamente é isso. O sistema ainda está em desenvolvimento, está sendo bem interessante e prazerosa a construção do mesmo. Estou usando de certa forma o padrão MVC, orientado a objetos e sem a utilização de um framework. Sim, já sei... Usar um framework é bem melhor, mais organizado. Mas neste caso eu queria estudar melhor orientação a objetos de forma crua...
	<br>
    Estou usando Containers para não ter em minhas classes um forte acoplamento e nem mesmo dependência de forma direta. No caso estou fazendo uso de Injeção de dependências (Dependency Injection)
</p>

<h3>Módulos atuais:</h3>

<ul>
	<li>Cadastro de usuários ( Nível de acesso - super master - master - funcionário )</li>
	<li>Cadastro de tarefas ( Estado - pedente - sendo feita - concluída )</li>
	<li>Cadastro de mensagens global usando o editor ( Ckeditor )</li>
	<li>Área mostrando o andamento das tarefas cadastradas juntamente com a previsão de conclusão expressa em porcentagem</li>
	<li>Cadastro de arquivos de variados tipos que podem ser definidos pelo administrador do sistema, como: pdf, zip, rar, php...</li>
	<li>Acesso a API do Gravatar para buscar imagens de perfil vinculadas ao email dos usuários</li>
</ul>

<h1>Layout Atual:</h1>
<img src="https://scontent-a-gru.xx.fbcdn.net/hphotos-xpa1/v/t1.0-9/10917134_695038720618706_9007768139795650316_n.jpg?oh=c820f70171358aa25cd9dd43f68508a9&oe=55415760" alt="">