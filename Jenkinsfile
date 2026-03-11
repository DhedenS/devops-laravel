node {

  checkout scm

  stage("Build") {
    docker.image('php:8.2-cli').inside('-u root') {
      sh 'apt-get update && apt-get install -y git unzip curl'
      sh 'docker-php-ext-install bcmath'
      sh 'curl -sS https://getcomposer.org/installer | php'
      sh 'mv composer.phar /usr/local/bin/composer'
      sh 'git config --global --add safe.directory /var/jenkins_home/workspace/project6'
      sh 'php -v'
      sh 'php -m | grep bcmath'
      sh 'composer --version'
      sh 'composer install'
    }
  }

  stage("Test") {
    docker.image("ubuntu").inside("-u root") {
      sh 'echo "Ini adalah test"'
    }
  }

}
