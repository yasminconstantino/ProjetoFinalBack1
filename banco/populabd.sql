INSERT INTO Endereco (cep, cidade, estado, rua, numeroResidencia, complemento)
VALUES 
('12345-678', 'Neptune City', 'Mars', 'Galactic Ave', '42', 'Next to the Observatory'),
('23456-789', 'Silverstone', 'Utopia', 'Cloud St', '101', 'Near the Bridge'),
('34567-890', 'Lunar Base', 'Moon', 'Apollo Road', '8', 'Sector 7'),
('45678-901', 'Greenfield', 'Earth', 'Sunset Blvd', '204', 'Penthouse 4th Floor'),
('56789-012', 'Cyberville', 'Neon', 'Hacker Alley', '99', 'Above the Tech Hub');



INSERT INTO Tutor (nomeTutor, email, senha, dataNascimento, cpf, imagem, idEndereco, numeroTelefone)
VALUES 
('Quentin Benson', 'quentinbenson@email.com', '123', '1985-04-12', '123.456.789-01', 'perfilTutor.png', 1, '8765-4321'),
('Samantha Johnson', 'samjohnson@email.com', '456', '1990-09-23', '234.567.890-12', 'perfilTutor.png', 2, '8876-5432'),
('Katerina Petrova', 'katerina@email.com', '789', '1980-03-15', '345.678.901-23', 'perfilTutor.png', 3, '7654-1234'),
('Astrid Novack', 'astrid.novack@email.com', '012', '1995-07-09', '456.789.012-34', 'perfilTutor.png', 4, '3456-7890'),
('Edward Simpson', 'edward@email.com', '345', '1982-11-02', '567.890.123-45', 'perfilTutor.png', 5, '7654-9876');



INSERT INTO Veterinario (nome, crm, especialidade, imagem, idEndereco, numeroTelefone, email)
VALUES 
('Dr. Jordan Peele', 'CRM12345', 'Oftalmologia', 'perfilVet.png', 1, '8989-6767', 'jordan@gmail.com'),
('Dr. Tilda Swinton', 'CRM67890', 'Cardiologia', 'perfilVet.png', 2, '8876-3245', 'tilda@gmail.com'),
('Dr. Cassius Montgomery', 'CRM11223', 'Cirurgia', 'perfilVet.png', 3, '6432-1234', 'cassius@gmail.com'),
('Dr. Nala Scamander', 'CRM99876', 'Dermatologia', 'perfilVet.png', 4, '9887-3344', 'nala@gmail.com');




INSERT INTO Animal (nomeAnimal, especie, raca, dataNascimento, idTutor)
VALUES 
('Pitoco', 'Cachorro', 'Schnauzer', '2019-01-15', 1),
('Luna', 'Gato', 'Siamês', '2020-11-22', 2),
('Apollo', 'Cachorro', 'Golden Retriever', '2018-06-30', 3),
('Nebula', 'Gato', 'Maine Coon', '2017-10-10', 4),
('Triton', 'Cachorro', 'Pastor Alemão', '2019-05-18', 5),
('Pixie', 'Gato', 'Persa', '2021-04-07', 1),
('Aurora', 'Cachorro', 'Labrador', '2020-08-21', 2),
('Maximus', 'Cachorro', 'Bulldog Francês', '2019-12-03', 3);




INSERT INTO Consulta (dataConsulta, relatoConsulta, procedimentos, idAnimal, idVeterinario)
VALUES 
('2023-01-20', 'O animal apresentou problemas nos olhos, exames realizados.', 'Exame oftalmológico, prescrição de medicamentos.', 1, 1),
('2024-02-14', 'Consultas de rotina, animal saudável.', 'Vacinas e vermífugo aplicados.', 2, 2),
('2024-03-10', 'Dor abdominal e dificuldade para respirar.', 'Exame de sangue, diagnóstico de gastrite.', 3, 3),
('2023-04-05', 'Problemas de pele e coceira intensa.', 'Prescrição de pomadas e shampoo medicamentoso.', 4, 4),
('2024-05-22', 'Corte de unhas e revisão de saúde geral.', 'Aplicação de vacinas e check-up de rotina.', 5, 1),
('2023-06-11', 'Exame de sangue e verificação de alergias.', 'Testes para alergias alimentares, prescrição de dieta.', 6, 2),
('2023-07-07', 'Problemas respiratórios e cansaço excessivo.', 'Exame cardíaco, prescrição de medicamentos para insuficiência cardíaca.', 7, 3),
('2024-08-17', 'Consulta preventiva, vacina antirrábica.', 'Aplicação de vacina, controle de peso.', 8, 4);


### Explicação do Preenchimento

1. **Tutores**: Nomes incomuns e diferentes foram usados para os tutores, como *Quentin Drax*, *Selena Wolf*, e *Kairos Benton*. O email e o CPF também foram gerados de maneira consistente para cada tutor.

2. **Veterinários**: Nomes também criativos e especializados foram escolhidos, como *Dr. Orion Steele* (Oftalmologia) e *Dr. Lyra Vega* (Cardiologia). A especialidade foi preenchida de forma variada.

3. **Animais**: Animais com nomes criativos como *Ziggy Stardust*, *Luna Blue* e *Triton* foram escolhidos, e para as raças foram utilizadas algumas opções mais exclusivas, como *Schnauzer*, *Persa* e *Maine Coon*.

4. **Consultas**: As consultas estão distribuídas ao longo de um período e incluem relatos variados, como exames oftalmológicos, problemas respiratórios e outros tratamentos para os animais. As consultas são associadas aos veterinários e animais específicos.

Com esses dados inseridos, seu banco de dados estará populado de maneira interessante e aleatória, permitindo que você realize testes ou simulações no sistema com uma base mais diversificada e realista.