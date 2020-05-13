#!bin/bash

if [ "$TRAVIS_REPO_SLUG" == "tazorax/math-utils" ] && [ "$TRAVIS_PULL_REQUEST" == "false" ] && [ "$TRAVIS_PHP_VERSION" == "7.3" ] && [ -a vendor/bin/phpdoc ]; then
  ## Generation
  php vendor/bin/phpdoc -d ./src -t ./build/docs

  echo -e "Publishing PHPDoc...\n"
  ## Copie de la documentation generee dans le $HOME
  cp -R build/docs $HOME/docs-latest

  cd $HOME
  ## Initialisation et recuperation de la branche gh-pages du depot Git
  git config --global user.email "travis@travis-ci.org"
  git config --global user.name "travis-ci"
  git clone --quiet --branch=gh-pages "https://${GH_TOKEN}@github.com/${TRAVIS_REPO_SLUG}.git" gh-pages > /dev/null

  cd gh-pages

  ## Suppression de l'ancienne version
  git rm -rf ./docs/$TRAVIS_BRANCH

  ## Création des dossiers
  mkdir docs
  cd docs
  mkdir $TRAVIS_BRANCH

  ## Copie de la nouvelle version
  cp -Rf $HOME/docs-latest/* ./$TRAVIS_BRANCH/

  ## On ajoute tout
  git add -f .
  ## On commit
  git commit -m "PHPDocumentor (Travis Build : $TRAVIS_BUILD_NUMBER  - Branch : $TRAVIS_BRANCH)"
  ## On push
  git push -fq origin gh-pages > /dev/null
  ## Et c est en ligne !
  echo -e "Published PHPDoc to gh-pages.\n"

fi