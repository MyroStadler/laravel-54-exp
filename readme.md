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
548  git remote add origin https://github.com/MyroStadler/laravel-54-exp.git
549  git push origin master
550  history
551  artisan make:migration create_answers_table
552  artisan make:model Answer
553  artisan migrate
554  artisan make:controller AnswersController --resource
555  artisan route:list
556  artisan make:auth
557  artisan route:list
558  artisan migrate
559  artisan migrate:create
560  artisan make:migration add_user_id_to_questions --table=questions
561  artisan make:migration add_user_id_to_answers --table=answers
587  rm -f database/database.sqlite
588  artisan migrate:install
589  touch database/database.sqlite
590  artisan migrate:install
591  artisan migrate
592  artisan route:list
599  npm run dev
600  artisan cache:clear
601  composer dump-autoload
```