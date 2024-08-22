alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'

sail up -d

sail artisan storage: link

sail artisan migrate:fresh --seed

sail composer i

sail down
