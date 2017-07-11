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
> response
```json
{
    "data": {
        "package": {
            "id": "A",
            "name": "PackageName A",
            "details": [
                "Service 1",
                "Service 2",
                "Service 3"
            ],
            "price": {
                "currency": "S/",
                "amount": 100
            }
        }
    }
}
```

* test the API via curl ( without filter)
~~~~
curl http://localhost:8080 -d '{"execute": "query { packages{ id name price{currency amount} } }" }'
~~~~
> response
```json
{
    "data": {
        "packages": [
            {
                "id": "A",
                "name": "PackageName A",
                "details": [
                    "Service 1",
                    "Service 2",
                    "Service 3"
                ],
                "price": {
                    "currency": "S/",
                    "amount": 100
                }
            },
            {
                "id": "B",
                "name": "PackageName B",
                "details": [
                    "Service 4",
                    "Service 5",
                    "Service 6"
                ],
                "price": {
                    "currency": "$",
                    "amount": 200
                }
            }
        ]
    }
}
```

**NOTE:**
> For more commands execute
~~~~
$ make 
~~~~ 