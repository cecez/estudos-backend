```shell

# criar classe para job
php artisan make:job NominhoDoJob

# iniciar worker para fila (default) de jobs
php artisan queue:work

# executa worker para determinadas filas, em ordem de prioridade crescente
php artisan queue:work --queue=pagamentos,default
```