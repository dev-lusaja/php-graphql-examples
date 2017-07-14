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

* Query test to API using curl ( with id filter)
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

* Query test to API using curl ( without filter)
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

* Mutation test to API using curl (add)
~~~~
curl http://localhost:8080 -d '{"execute": "mutation { add( package: {name: \"Package Mutation\" price: {amount: 100 currency: \"$\"} details: [\"Detail 1\", \"Detail 2\" ] } ){id name} }" }'
~~~~
> response
```json
{
    "data": {
        "add": {
            "id": "1499981937X",
            "name": "Package Mutation"
        }
    }
}
```

* Mutation test to API using curl (update)
~~~~
curl http://localhost:8080 -d '{"execute": "mutation { update( id: \"1499981937X\", package: {name: \"Package Updated\" price: {amount: 100 currency: \"$\"} details: [\"Detail 1\", \"Detail 2\" ] } ){id name} }" }'
~~~~
> response
```json
{
    "data": {
        "update": {
            "id": "1499981937X",
            "name": "Package Updated"
        }
    }
}
```

* Mutation test to API using curl (remove)
~~~~
curl http://localhost:8080 -d '{"execute": "mutation { remove( id: \"1499981937X\"){id name} }" }'
~~~~
> response
```json
{
    "data": {
        "remove": {
            "id": "1499981937X",
            "name": "Package Mutation"
        }
    }
}
```
**NOTE:**
> For more commands execute
~~~~
$ make 
~~~~ 