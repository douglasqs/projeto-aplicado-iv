# Walkthrough - Novo Sistema PHP MVC

A aplicação foi completamente reformulada para utilizar uma arquitetura MVC moderna, limpa e segura.

## Estrutura de Pastas

- **public/**: Arquivos públicos (CSS, JS, Imagens). Onde o servidor web deve apontar.
- **src/**: Código fonte da aplicação (Controllers, Models, Views).
- **database/**: Contém o arquivo `database.sqlite`.

## Como Rodar

### 1. Iniciar o Servidor
Com SQLite, você **não precisa** de um servidor MySQL rodando. O banco de dados já foi inicializado.
Abra o terminal na pasta raiz do projeto e execute:

```powershell
php -S localhost:8000 -t public
```

Acesse: [http://localhost:8000](http://localhost:8000)

## Funcionalidades Novas
- **Banco de Dados Local**: Utiliza SQLite (arquivo único), facilitando o transporte e execução do projeto.
- **Segurança**: Senhas agora são salvas com hash seguro (Bcrypt).
- **UX**: Design responsivo e moderno com CSS Flexbox/Grid.
- **Organização**: Código separado em Models, Views e Controllers.

