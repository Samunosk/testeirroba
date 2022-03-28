CREATE TABLE tb_agendamento (
  cod_agendamento INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  cod_medico INTEGER UNSIGNED NOT NULL,
  cod_pacientes INTEGER UNSIGNED NOT NULL,
  data_agendamento DATE NULL,
  hora_agendamento TIME NULL,
  PRIMARY KEY(cod_agendamento)
);

CREATE TABLE tb_medico (
  cod_medico INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nm_medico VARCHAR(60) NULL,
  especializacao VARCHAR(60) NULL,
  senha_medico INTEGER UNSIGNED NULL,
  PRIMARY KEY(cod_medico)
);

CREATE TABLE tb_pacientes (
  cod_pacientes INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nm_pacientes VARCHAR(60) NULL,
  cpf_pacientes INTEGER UNSIGNED NULL,
  PRIMARY KEY(cod_pacientes)
);

CREATE TABLE tb_user/medico (
  cod_pacientes INTEGER UNSIGNED NOT NULL,
  cod_medico INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(cod_pacientes, cod_medico)
);

