node {

  checkout scm

  stage("Build") {
    docker.image('php:8.2-cli').inside('-u root') {
      sh '''
        apt-get update
        apt-get install -y git unzip curl
        docker-php-ext-install bcmath
        curl -sS https://getcomposer.org/installer | php
        mv composer.phar /usr/local/bin/composer
        git config --global --add safe.directory /var/jenkins_home/workspace/laravel-dev
        php -v
        php -m | grep bcmath
        composer --version
        composer install
      '''
    }
  }

  stage("Test") {
    docker.image("ubuntu").inside("-u root") {
      sh 'echo "Ini adalah test"'
    }
  }

  stage("Deploy Production") {
    docker.image('agung3wi/alpine-rsync:1.1').inside('-u root') {
      sshagent(credentials: ['ssh-prod']) {
        sh '''
          mkdir -p ~/.ssh
          chmod 700 ~/.ssh
          ssh-keyscan -H "$PROD_HOST" >> ~/.ssh/known_hosts

          ssh -o StrictHostKeyChecking=no den@$PROD_HOST "mkdir -p /home/den/prod.kelasdevops.xyz"

          rsync -rav --delete ./ den@$PROD_HOST:/home/den/prod.kelasdevops.xyz/ \
            --exclude=.env \
            --exclude=storage \
            --exclude=.git
        '''
      }
    }
  }
}
