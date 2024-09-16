lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin
brain-games:
	./bin/brain-games
brain-even:
	./bin/brain-even
brain-calc:
	./bin/brain-calc
brain-gcd:
	./bin/brain-gcd
brain-progression:
	./bin/brain-progression
validate:
	composer validate
dump:
	composer dump-autoload