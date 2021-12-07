```shell

# criar classe para job
php artisan make:job NominhoDoJob

# iniciar worker para fila (default) de jobs
php artisan queue:work

# executa worker para determinadas filas, em ordem de prioridade crescente
php artisan queue:work --queue=pagamentos,default

# recoloca na fila um job falhado
php artisan queue:retry uuid_job

# termina execução do worker se fila estiver vazia (--stop-when-empty)
# e aborta sua execução se passar do tempo estipulado (--max-time=540)
php artisan queue:work --stop-when-empty --max-time=540
```