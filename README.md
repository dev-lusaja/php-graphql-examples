Requirements
------------

* docker engine (version used: 17.03.0-ce)
* docker-compose (version used: 1.11.1)
* make (version used: 4.1)

Commands
--------
* Install the project
~~~~
$ make build
$ make up
$ make composer
~~~~

* test the API via curl ( with id filter)
~~~~
curl http://localhost:8080 -d '{"execute": "query { package(id: \"A\"){id name details price{currency amount}} }" }'
~~~~

* test the API via curl ( without filter)
~~~~
curl http://localhost:8080 -d '{"execute": "query { packages{ id name price{currency amount} } }" }'
~~~~

**NOTE:**
> For more commands execute
~~~~
$ make 
~~~~ 