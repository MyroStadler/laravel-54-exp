# Laravel 5.4 experiment

## Bash roadmap

```$bash
523  composer create-project laravel/laravel="5.4.*" LaravelAnswer
524  cd LaravelAnswer/
525  npm install
526  composer dump-autoload
528  artisan route:list
529  artisan make:controller QuestionController --resource
531  touch database/database.sqlite
533  vim .env
535  artisan migrate:install
536  artisan make:migration create_questions_table
537  artisan migrate
538  artisan make:model Question
539  artisan route:list
540  artisan vendor:publish --tag=laravel-pagination
541  git init
```