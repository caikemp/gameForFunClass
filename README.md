# gameForFunClass  teste

A simple project for gamers lovers

o que esperado:

- Precisamos criar um serviço que vai retornar as informações de jogos.
- Criar um novo projeto com laravel 7x

Controller
 - game/list => todos os jogos
 - game/search => resultado da busca
 - game/save => cria um novo jogo ou atualiza
 - game/remove => remove um jogo


   * store/list => todas as lojas
   * store/search => resultado da busca
   * store/save => cria ou salva uma lojas => associação, passando uma lista de jogos com preço
   * store/remove => remove uma loja


* listagem: []

* game:
- id
- name
- category []
- image_url
- platform []
- description
- gender
- bestAge
- created_at
- updated_at

store
- id
- name
- site
- description
- created_at
- updated_at

store_game
- id
- store_id
- game_id
- price
- created_at
- updated_at
