# Jumia Exercise

#### Clone and change directory

```
git clone git@github.com:khaled-dev/jumia-practical-exercise.git

cd jumia-practical-exercise
```

#### Copy `env` file
```
cp .env.example .env
```
###

#### Copy/Rename your database file to `database/database.sqlite`

> Warning: Make sure the databases is stored in the given folder with the given file name and extension

---
###

#### Build docker image and run the containers
```
docker-compose up 
```

###

> If port 80 already taken, try to change the env variable `APP_PORT` and rerun the preves command

#### Build VueJs views
```
docker exec -it jumia-practical-exercise_app_1 npm run dev
```

#### Run the tests
```
docker exec -it jumia-practical-exercise_app_1 php artisan test
```
