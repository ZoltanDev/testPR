# testPr
Takes MSISDN as an input and returns MNO identifier, country dialling code, subscriber number and country identifier.

## Requirements

Make sure you have [Vagrant](https://www.vagrantup.com/) installed.

## Instructions 

git clone ...

cd mydir

vagrant up
Navigate to: http://localhost:8000/

## Tests

./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/ParserTest

## RPC-API

The package is exposed through Json RPC API because Json is:
 * lightweight;
 * recognized natively by JavaScript;
 * highly portable, it relies on two fundamental structures:
    * A collection of name/value pairs;
    * An ordered list of values.

