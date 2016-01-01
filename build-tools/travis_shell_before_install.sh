#!bin/bash

if [ "$TRAVIS_REPO_SLUG" == "tazorax/math-utils" ] && [ "$TRAVIS_PULL_REQUEST" == "false" ] && [ "$TRAVIS_PHP_VERSION" == "5.5" ]; then
  apt-get -qq update > /dev/null
  apt-get -qq install graphviz > /dev/null
fi