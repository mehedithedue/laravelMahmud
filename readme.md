<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

php artisan crud:generate Category --fields='name#string; category#string; status#integer; serial#integer' --view-path=admin --controller-namespace=Admin --model-namespace=Models

php artisan crud:generate Image --fields='type#string; category_id#integer; ref_id#integer;file_path#string; status#integer;' --view-path=admin --controller-namespace=Admin --model-namespace=Models




php artisan crud:generate Content --fields='type#string; ref_id#integer; key#string; data#text; status#integer;' --view-path=admin --controller-namespace=Admin --model-namespace=Models
