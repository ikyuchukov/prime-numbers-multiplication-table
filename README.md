Prime Multiplication Table Homework Task


## Installation
Run ```docker-compose up -d``` to build the images and run the PHP and MySQL containers.

## Usage
You can enter the docker container by running ```docker exec -it prime-multiplication-table /bin/bash``` 

Once inside the container, you can run the following command:

```bin/console prime-multiplication-table 10```

This will generate a multiplication table of the first 10 prime numbers.

## Full usage information:

```app:prime-multiplication-table [options] [--] <number> [<no-table>] ```                                                          

**Shorthand is available:** 
```pmt```

### Arguments:                                                                                                                      
**number**                     The number of prime numbers to generate.                                                           
**no-table**                   Do not show the multiplication table [default: false]

### Options:                                                                                                                       
**-o, --operation=OPERATION**  The operation to perform on the prime numbers. [default: "*"]                                      
**-h, --help**                 Display help for the given command. When no command is given display help for the list command     
**-q, --quiet**                Do not output any message                                                                          
**-V, --version**              Display this application version                                                                   
**--ansi|--no-ansi**       Force (or disable --no-ansi) ANSI output                                                           
**-e, --env=ENV**              The Environment name. [default: "dev"]                                                             
**--no-debug**             Switch off debug mode.                                                                             
**-v|vv|vvv, --verbose**       Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

### Examples:
```
bin/console pmt 100
bin/console pmt 100 --operation='+'
bin/console pmt 100 --operation='- 5 * 23 / 7'
bin/console pmt 100000 --no-table
```

## Complexity
Raw complexity of the prime number generator algorithm is  O(N) where n is the number of prime numbers to generate.
With space complexity of O(N) as well.

However, we must account for 5-10% inefficiency due to the need to find Nth number of prime numbers and not prime numbers up to an upper bounds limit as well as some inefficiencies in the implementation. 