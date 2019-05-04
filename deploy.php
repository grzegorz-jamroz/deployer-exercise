<?php
namespace Deployer;

use Symfony\Component\Dotenv\Dotenv;

require 'recipe/common.php';

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

$deployServer =  $_ENV['DEPLOY_SERVER'];
$deployPort =  $_ENV['DEPLOY_PORT'];
$deployUser =  $_ENV['DEPLOY_USER'];
$deployPath =  $_ENV['DEPLOY_PATH'];

// Project name
set('application', 'deployer-exercise');

// Project repository
set('repository', 'https://gitlab.com/grzegorz-jamroz/deployer-exercise');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
set('shared_files', []);
set('shared_dirs', []);

// Writable dirs by web server 
set('writable_dirs', []);


// Hosts

host($deployServer)
	->stage('production') 
    ->set('hostname', $deployServer)
    ->user($deployUser)
    ->port($deployPort)
    ->set('deploy_path', '~/'.$deployPath);

// Tasks

desc('Deploy your project');
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
]);

task('test', function () use ($deployUser) {
	if (isset($deployUser)) {
		writeln('Hello ' . $deployUser . '!!!');
	}
});

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
