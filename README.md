# 🏆 WinBet Simulator

Sistema de apostas esportivas simuladas desenvolvido com PHP, MySQL e Bootstrap. Projeto criado para fins educacionais e demonstração de habilidades em desenvolvimento web.

---

## 🚀 Funcionalidades

- ✅ Cadastro de usuários com senha criptografada
- ✅ Login e logout com sessões PHP
- ✅ Proteção de páginas — apenas usuários logados acessam
- ✅ Listagem de jogos disponíveis com odds
- ✅ Realização de apostas vinculadas ao usuário
- ✅ Histórico de apostas por usuário
- ✅ Proteção contra SQL Injection com Prepared Statements
- ✅ Proteção contra XSS com htmlspecialchars

---

## 🛠️ Tecnologias utilizadas

- **PHP 8.2**
- **MySQL / MariaDB**
- **HTML5 & CSS3**
- **Bootstrap 5**
- **XAMPP** (ambiente local)

---

## 📁 Estrutura do projeto

```
winbet/
├── index.php         # Página inicial (requer login)
├── cadastro.php      # Formulário de cadastro
├── cadastrar.php     # Processa o cadastro
├── login.php         # Formulário de login
├── logar.php         # Processa o login
├── logout.php        # Encerra a sessão
├── apostas.php       # Lista de jogos disponíveis
├── apostar.php       # Formulário de aposta
├── salvar.php        # Processa a aposta
├── resultado.php     # Exibe o resultado da aposta
├── lista.php         # Histórico de apostas do usuário
└── banco.sql         # Estrutura do banco de dados
```

---

## 🗄️ Banco de dados

O projeto utiliza duas tabelas:

**usuarios** — armazena os dados dos usuários
| Campo | Tipo | Descrição |
|-------|------|-----------|
| id | INT | Chave primária |
| nome | VARCHAR | Nome do usuário |
| email | VARCHAR | Email (único) |
| senha | VARCHAR | Senha criptografada com password_hash |
| criado_em | DATETIME | Data de cadastro |

**apostas** — armazena as apostas realizadas
| Campo | Tipo | Descrição |
|-------|------|-----------|
| id | INT | Chave primária |
| usuario_id | INT | Chave estrangeira para usuarios |
| jogo | VARCHAR | Jogo escolhido |
| valor | DECIMAL | Valor apostado |
| palpite | VARCHAR | Palpite do usuário |
| criado_em | DATETIME | Data da aposta |

---

## ⚙️ Como rodar o projeto

**1. Clone o repositório**
```bash
git clone https://github.com/SEU_USUARIO/winbet.git
```

**2. Instale o XAMPP**

Baixe em: https://www.apachefriends.org

**3. Copie os arquivos**

Cole a pasta `winbet` dentro de `C:\xampp\htdocs\`

**4. Crie o banco de dados**

- Inicie o Apache e o MySQL no XAMPP
- Acesse `http://localhost/phpmyadmin`
- Crie um banco chamado `winbet`
- Importe o arquivo `banco.sql`

**5. Acesse o projeto**
```
http://localhost/winbet/cadastro.php
```



## 👨‍💻 Autor

Desenvolvido como projeto de portfólio para demonstração de habilidades em desenvolvimento web com PHP e MySQL.



## ⚠️ Aviso

Este projeto é apenas um **simulador educacional**. Não envolve dinheiro real nem incentiva apostas.
