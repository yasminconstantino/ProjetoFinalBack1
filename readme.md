# **FindVet - Conectando Tutores e Veterinários**  

### **Propósito do Projeto**  
A **FindVet** é um aplicativo projetado para conectar tutores de animais de estimação com veterinários, simplificando a busca por serviços veterinários e promovendo um cuidado mais eficiente para os pets. Ele ainda está em suas fases iniciais de desenvolvimento e irá oferecer funcionalidades como agendamento de consultas, gerenciamento de informações dos pets e comunicação direta entre veterinários e tutores. A solução busca digitalizar e otimizar os processos envolvidos no cuidado animal, trazendo praticidade e organização para tutores e profissionais da área.  

---

### **Objetivos**  

#### **Objetivo Principal**  
Desenvolver uma plataforma digital acessível e eficiente que facilite a comunicação entre tutores e veterinários, promovendo cuidados mais rápidos e organizados para os animais de estimação.  

#### **Objetivo Secundário**  
- Proporcionar uma interface intuitiva para cadastro e gerenciamento de informações dos pets.  
- Permitir a visualização e o agendamento de consultas veterinárias.  
- Oferecer uma área administrativa para que veterinários gerenciem seus atendimentos e dados dos pacientes.  

---

### **Como Configurar e Executar a Aplicação**  

1. **Instalar o XAMPP:**  
   - O XAMPP é necessário para configurar um servidor Apache e um banco de dados MySQL. Faça o download em [https://www.apachefriends.org/pt_br/index.html](https://www.apachefriends.org/pt_br/index.html).  

2. **Iniciar o XAMPP:**  
   - Após a instalação, inicie os módulos **Apache** e **MySQL** no painel de controle do XAMPP.  

3. **Criar e Configurar o Banco de Dados:**  
   - Acesse o banco de dados MySQL pelo phpMyAdmin e insira o script disponível na pasta `banco` para criar as tabelas necessárias (Tutores, Pets, Veterinários, Consultas, etc.).  

4. **Configurar o Projeto:**  
   - Coloque os arquivos da aplicação na pasta `htdocs` do XAMPP (exemplo: `C:/xampp/htdocs/projetoback`).  

5. **Acessar a Aplicação:**  
   - No navegador, acesse o endereço `http://localhost/projetoback` para iniciar o aplicativo.  

---

### **Estrutura e Principais Funcionalidades Atuais**  

#### **Área do Tutor**  
1. **Cadastro e Login:**  
   - Os tutores podem criar uma conta ou acessar a aplicação com suas credenciais.  
   
2. **Página Inicial:**  
   - Visualização da lista de veterinários disponíveis com filtros por especialidade e nome.  
   - Exibição dos pets do tutor logado.

3. **Gerenciamento de Pets:**  
   - Cadastro de informações detalhadas dos pets, como nome, espécie, raça, data de nascimento, sexo e cor.  
   - Edição e exclusão de informações de pets.  

---

### **Implementações futuras**

1. **Agendamento de Consultas:**  
   - Permite aos tutores agendar consultas com veterinários, especificando informações relevantes.  
   - Visualização do histórico de consultas com status (pendente, concluída, cancelada).  

#### **Área do Veterinário**  (começada mas nao finalizada)
1. **Página Inicial:**  
   - Visualização de consultas agendadas com detalhes sobre os pets e tutores.  

2. **Gerenciamento de Consultas:**  
   - Permite atualizar o status das consultas (pendente, em andamento, concluída).  

3. **Perfil Profissional:**  
   - Os veterinários podem editar seu perfil profissional, incluindo nome, especialidade, e-mail e horário de atendimento.  

#### **Funcionalidades que terão em comum**  
- **Edição de Perfil:**  
  - Tanto tutores quanto veterinários podem atualizar suas informações pessoais.  
- **Sistema de Mensagens:**  
  - Comunicação direta entre tutores e veterinários por meio de mensagens no aplicativo.  

---

### **Tecnologias Utilizadas atualmente**  
- **Frontend:** HTML5 
- **Backend:** PHP.  
- **Banco de Dados:** MySQL.  
Será inserido `CSS3` e `JavaScript` para estilização e validação de formualrios.
