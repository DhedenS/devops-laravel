node {

  checkout scm

  stage("Build") {
    docker.image('php:8.2-cli').inside('-u root') {
      sh 'apt-get update && apt-get install -y git unzip curl'
      sh 'curl -sS https://getcomposer.org/installer | php'
      sh 'mv composer.phar /usr/local/bin/composer'
      sh 'php -v'
      sh 'composer --version'
      sh 'composer install'
    }
  }

  stage("Test") {
    docker.image('ubuntu').inside('-u root') {
      sh 'echo "Ini adalah test"'
    }
  }

}
