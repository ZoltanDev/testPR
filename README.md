# testPr
Takes MSISDN as an input and returns MNO identifier, country dialling code, subscriber number and country identifier.

## Requirements

Make sure you have Vagrant installed

## Instructions 

Commands:

Vagrant up

Navigate to: http://localhost:8000/

## Tests

./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/ParserTest

## RPC-API

The package is exposed through Json RPC API because Json is:
 -lightweight;
 -recognized natively by JavaScript;
 -highly portable, it relies on two fundamental structures:
    1. A collection of name/value pairs;
    2. An ordered list of values.

