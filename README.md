# Deployer - practice

This project introduce basic [Deployer](https://deployer.org/) usage. 

## Installation

- [install Deployer](https://deployer.org/docs/installation.html)

- run composer install
```bash
composer install
```

- rename [.env-example](.env-example) to *.env* and change example variables
```bash
PROJECT_NAME=deployer-exercise
DEPLOY_SERVER=your.project.com
DEPLOY_PORT=9999
DEPLOY_USER=username
DEPLOY_PATH=path/to/your/project/deployer
DEPLOY_REPOSITORY=git@github.com:grzegorz-jamroz/deployer-exercise.git
```

- add remote server SSH key to [Github SSH keys](https://github.com/settings/keys)

## Usage

This platform contains only two endpoints:

- **Run test task**

```bash
dep test production
```

example output:
```bash
Hello username!!!
```

- **Deploy changes**
```bash
dep deploy production
```

example output:
```bash
✈︎ Deploying master on your.project.com
✔ Executing task deploy:prepare
✔ Executing task deploy:lock
✔ Executing task deploy:release
➤ Executing task deploy:update_code
Cloning into '/home/username/deployer-exercise/deployer/releases/1'...
The authenticity of host 'github.com (XXX.XX.XXX.X)' can't be established.
RSA key fingerprint is SHA256:xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx.
RSA key fingerprint is MD5:XX:XX:xx:xx:xx:xx:xx:xx:xx:xx:xx:xx:xx:xx:xx:xx.
Are you sure you want to continue connecting (yes/no)?
```

confirm:

```bash
 yes
```

```bash
Warning: Permanently added 'github.com,XXX.XX.XXX.X' (RSA) to the list of known hosts.
remote: Enumerating objects: 9, done.
remote: Counting objects: 100% (9/9), done.
remote: Compressing objects: 100% (7/7), done.
remote: Total 9 (delta 0), reused 7 (delta 0), pack-reused 0
Receiving objects: 100% (9/9), 4.22 KiB | 0 bytes/s, done.
Connection to your.project.com closed.
✔ Ok
✔ Executing task deploy:shared
✔ Executing task deploy:writable
✔ Executing task deploy:vendors
✔ Executing task deploy:clear_paths
✔ Executing task deploy:symlink
✔ Executing task deploy:unlock
✔ Executing task cleanup
Successfully deployed!
```

After that you will see your files inside deployer/current folder (Remember to link your page to this location)