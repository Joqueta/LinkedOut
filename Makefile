flash:
	./vendor/bin/sail artisan db:wipe
	./vendor/bin/sail artisan migrate
	./vendor/bin/sail artisan db:seed
	./vendor/bin/sail npm run dev