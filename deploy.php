<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project repository
set('repository', 'git@165.227.107.177:bourbon/beback.git');

// Shared files/dirs between deploys
add('shared_files', ['.env']);
add('shared_dirs', ['storage']);

// Writable dirs by web server
add('writable_dirs', ['storage']);
set('allow_anonymous_stats', false);

host('qa.interaktiv.local')
    ->user('deploy')
    ->stage('QA')
    ->identityFile('~/.ssh/id_rsa')
    ->set('deploy_path', '/Workspace/HotelBourbon/beback')
    ->set('branch', 'master');

// Tasks
task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

//before('deploy:symlink', 'artisan:migrate');

