# 🍎🥕 Fruits and Vegetables

## Developer's Diary

### 31/07/2023 16:25 - used time 20m
* added some basic classes
* updated php version in composer.json to 8.1, so I can use Enums

### 01/08/2023 10:40 - used time 40m
* removed the specific Fruit and Vegetable classes as they are not special from each other and the collections/models can be  
  already distinguished by the ProduceType
* added same base tests for Model creation

### 01/08/2023 13:15 - used time 1h10m
* basic requirements should be done
* only simple tests, no tests for edge cases and wrong input
* todo: add the possibility to switch between kg/g for list()

### 01/08/2023 17:15 - used time 1h30m
* added support for unit switching

### 01/08/2023 17:30 - used time 1h45m
* Because of the time restrictions on my side I went for a really simple solution
* I expect only correct input and I don't have checks for wrong inputs and don't use any exception in my code. 
* I don't test for wrong inputs and wrong behavior
* I didn't implement the search functionality
* I would probably get rid of the Interfaces (same way I got rid of AbstractClasses) as they don't have any real purpose here. 
  The Produce and Collection types are already differentiated enough by the type, and they don't have any special functionality 
  that would call for separate Interface/Abstract class (If I would really want to follow KISS and YAGNI principles here). 

## 🎯 Goal
We want to build a service which will take a `request.json` and:
* Process the file and create two separate collections for `Fruits` and `Vegetables`
* Each collection has methods like `add()`, `remove()`, `list()`;
* Units have to be stored as grams;
* As a bonus you might consider giving option to decide which units are returned (kilograms/grams);
* As a bonus you might consider how to implement `search()` method collections;

### ✔️ How can I check if my code is working?
You have two ways of moving on:
* You call the Service from PHPUnit test like it's done in dummy test (just run `bin/phpunit` from the console)

or

* You create a Controller which will be calling the service with a json payload

## 💡 Hints before you start working on it
* Keep KISS, DRY, YAGNI, SOLID principles in mind
* Timebox your work
* Your code should be tested

## 🐳 Docker image
Optional. Just here if you want to run it isolated.

### 📥 Pulling image
```bash
docker pull tturkowski/fruits-and-vegetables
```

### 🧱 Building image
```bash
docker build -t tturkowski/fruits-and-vegetables -f docker/Dockerfile .
```

### 🏃‍♂️ Running container
```bash
docker run -it -w/app -v$(pwd):/app tturkowski/fruits-and-vegetables sh 
```

### 🛂 Running tests
```bash
docker run -it -w/app -v$(pwd):/app tturkowski/fruits-and-vegetables bin/phpunit
```

### ⌨️ Run development server
```bash
docker run -it -w/app -v$(pwd):/app -p8080:8080 tturkowski/fruits-and-vegetables php -S 0.0.0.0:8080 -t /app/public
# Open http://127.0.0.1:8080 in your browser
```
