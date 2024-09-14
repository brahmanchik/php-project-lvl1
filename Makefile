lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin
brain-games:
	./bin/brain-games
brain-even:
	./bin/brain-even
validate:
	composer validate
dump:
	composer dump-autoload