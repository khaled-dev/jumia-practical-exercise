
# Jumia Exercise

#### Copy `env` file
```
cp .env.example .env
```
###

#### Copy/Rename your database file to `database/database.sqlite`

#### Make another file for test to `database/database_test.sqlite`

> Warning: Make sure databases are stored in the given folder with the given file name and extension 

###

#### Build docker image and run the containers
```
docker-compose up 
```

#### Build VueJs views
```
docker exec -it jumia-practical-exercise_app_1 npm dev
```

#### Run the tests
```
docker exec -it jumia-practical-exercise_app_1 php artisan test
```
